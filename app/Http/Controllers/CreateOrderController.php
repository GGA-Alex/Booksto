<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Order;

class CreateOrderController extends Controller
{
    
    public function index()
    {   
        if(auth()->user()){
            $this->authorize('userType', User::class);
        }
        $orders = Order::query()->where('user_id',auth()->user()->id);

        if(request('status')){
            $orders->where('status',request('status'));
        }

        $orders = $orders->get();
        $pendiente = Order::where('status',1)->where('user_id',auth()->user()->id)->count();
        $recibido = Order::where('status',2)->where('user_id',auth()->user()->id)->count();
        $enviado = Order::where('status',3)->where('user_id',auth()->user()->id)->count();
        $entregado = Order::where('status',4)->where('user_id',auth()->user()->id)->count();
        $anulado = Order::where('status',5)->where('user_id',auth()->user()->id)->count();

        return view('Booksto.User.Orders.orderIndex',compact('orders','pendiente','recibido','enviado','entregado','anulado'));
    }

    public function create()
    {
        if(auth()->user()){
            $this->authorize('userType', User::class);
        }
        return view('Booksto.User.Orders.order');
    }

    public function show(Order $orden){
        if(auth()->user()){
            $this->authorize('userType', User::class);
        }
        $this->authorize('author',$orden);
        $items = json_decode($orden->content);
        return view('Booksto.User.Orders.orderShow',compact('orden','items'));
    }

    public function payment(Order $orden)
    {
        if(auth()->user()){
            $this->authorize('userType', User::class);
        }
        $this->authorize('payment',$orden);

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),     // ClientID
                config('services.paypal.secret')      // ClientSecret
            )
        );

        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal(intval($orden->total));
        $amount->setCurrency('MXN');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(route('ordenes.approved',$orden))
            ->setCancelUrl(route('ordenes.show',$orden));

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($apiContext);
            return redirect()->away($payment->getApprovalLink());
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }
    }

    public function approved(Request $request, Order $orden){
        if(auth()->user()){
            $this->authorize('userType', User::class);
        }
        $this->authorize('payment',$orden);
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),     // ClientID
                config('services.paypal.secret')      // ClientSecret
            )
        );
        $paymentId = $_GET['paymentId'];
        $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);

        $execution = new \PayPal\Api\PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);
        // (See bootstrap.php for more on `ApiContext`)
        $result = $payment->execute($execution, $apiContext);

        
        return redirect()->route('ordenes.status',$orden);
    }

    public function status(Order $orden){
        if(auth()->user()){
            $this->authorize('userType', User::class);
        }
        $this->authorize('payment',$orden);
        $orden->status = 2;
        $orden->save();
        return redirect()->route('ordenes.show',$orden);
    }
}
