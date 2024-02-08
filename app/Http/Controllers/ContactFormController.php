<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;           //import class
use Illuminate\Support\Facades\Mail;    //import class

class ContactFormController extends Controller
{
    //
    public function create(){

        return view('contact.create');
    }

    public function store(){

        $data = request()->validate([
            'name' => 'required | min:3 | max:20',
            'email' => 'required | email',
            'message' => 'required | min:3 | max:200',
        ]);

        // dd(request()->all());

        //send an email
        //pass the $data into the ContactFormMail()
        Mail::to('test@test.com')->send(new ContactFormMail($data));

        // //another way to display the message of the alert.
        //     session()->flash('message', 'Thanks for your message. We\'ll be in touch.');

        // redirect back to contact                 // display the message of the alert.
        return redirect('/contact')->with('message', 'Thanks for your message. We\'ll be in touch.');

        // return redirect('/contact');
    }



}
