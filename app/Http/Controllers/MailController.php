<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Crypt;
use Mail;

class MailController extends Controller
{
    public function index($subject,$email,$title,$msg){
        $data = [
            'subject'=>$subject,
            'title'=>$title,
            'body'=>Crypt::decryptString($msg)
        ];

        try {
            Mail::to($email)->send(new MailNotify($data));
            // return response()->json(['Great sent']);
            return back()->with('email_send_success','A verification email has been sent to '.$email);
        } catch (Exception $th) {
            return back()->with('email_send_fail','We counldn\'t send a verification email to '.$email.'. Try again later!');
        }
    }
}
