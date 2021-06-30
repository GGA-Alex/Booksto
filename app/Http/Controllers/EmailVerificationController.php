<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function notice(){
        return view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request){
        $request->fulfill();

        return redirect()->route('HomePage');
    }
}
