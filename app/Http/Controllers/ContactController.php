<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'form_email' => 'required|email',
            'form_name' => 'required',
            'form_subject' => 'required',
            'form_message' => 'required'
        ]);

        $data = $request->only('form_email', 'form_name', 'form_subject', 'form_message', 'form_phone');

        Mail::send([], [], function ($message) use ($data) {
            $message->from($data['form_email'], $data['form_name'])
                ->to('admin2.hrd@gracia.co.id')
                ->cc('mis@gracia.co.id')
                ->subject($data['form_subject'])
                ->html($data['form_message']);
        });

        return redirect()->to('/contact')->with('pesan', '<center><strong>Your message has been sent successfully !</strong> </center>');
    }
}