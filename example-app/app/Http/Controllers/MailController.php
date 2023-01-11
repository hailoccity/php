<?php

namespace App\Http\Controllers;

use App\Jobs\NewJob;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request){
        $request->validate([
            'recipient' => 'required | email',
            'subject' => 'required | max:255',
            'contents' => 'required',
        ]);
        $mailData  = [
            'title'=>$request->title,
            'contents'=>$request->contents,
            'subject'=>$request->subject,
            'recipient' => $request->recipient,
        ];
//        $recipient = $request->recipient;
//        Mail::to($recipient)->send(new SendEmail($mailData));
        NewJob::dispatch($mailData)->delay(now()->addSeconds(20));
        return  redirect()->route('emails.show')->with('success', 'Email sent successfully');
    }
    public function show(){
        return view('emails.show');
    }

}
