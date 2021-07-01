<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function notice(){
        if(auth()->user()){
            $this->authorize('userType', User::class);
        }
        return view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request){
        $request->fulfill();

        return redirect()->route('HomePage');
    }
}
