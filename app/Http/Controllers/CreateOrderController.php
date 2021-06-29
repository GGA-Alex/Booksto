<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Order;

class CreateOrderController extends Controller
{
    

    public function index()
    {
        return view('Booksto.User.Orders.order');
    }

    public function checkout(Order $orden)
    {
        $items = json_decode($orden->content);

        return view('Booksto.User.Orders.orderPayment',compact('orden','items'));
    }

    public function payment(Order $orden)
    {
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
            ->setCancelUrl(route('ordenes.checkout',$orden));

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

        
        return redirect()->route('ordenes.show',$orden);
    }

    public function show(Order $orden){
        $orden->status = 2;
        $orden->save();
        $items = json_decode($orden->content);
        return view('Booksto.User.Orders.orderShow',compact('orden','items'));
    }
}
