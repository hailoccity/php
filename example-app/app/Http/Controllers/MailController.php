<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        $mailData  = [
            'title'=>'Hieu LD',
            'body'=>'Happy New Year',
            'subject'=>'Send Email Test'
        ];
//        dd(($mailData));
        Mail::to('ledoanhieu1997@gmail.com')->send(new SendEmail($mailData));
        dd('Ok');
    }
}
