<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Crypt;
use Mail;

class MailController extends Controller
{
    public static function sendMailResponse($subject,$email,$title,$msg){
        $data = [
            'subject'=>$subject,
            'title'=>$title,
            'body'=>$msg
        ];

        try {
            Mail::to($email)->send(new MailNotify($data));
            return 'sent';
        } catch (Exception $th) {
            return 'error';
        }
    }
    public function index($subject,$email,$title,$msg){
        $data = [
            'subject'=>$subject,
            'title'=>$title,
            'body'=>Crypt::decryptString($msg)
        ];

        try {
            Mail::to($email)->send(new MailNotify($data));
            // return response()->json(['Great sent']);
            return back()->with('success','A verification email has been sent to '.$email);
        } catch (Exception $th) {
            return back()->with('fail','We counldn\'t send a verification email to '.$email.'. Try again later!');
        }
    }
}
