<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|regex:/^[0-9]{10}$/',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {

            Mail::raw(
                "Name: {$validated['name']}\n" .
                "Email: {$validated['email']}\n\n" .
                "Phone: {$validated['phone']}\n" .
                "Message:\n{$validated['message']}",
                function ($mail) use ($validated) {
                    $mail->to(env('CONTACT_EMAIL'))
                         ->replyTo($validated['email'], $validated['name'])
                         ->subject('CK Edits Contact: ' . $validated['subject']);
                }
            );

            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your message has been sent.'
            ]);

        } catch (\Exception $e) {

            \Log::error('Contact form error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Unable to send your message. Please try again.'
            ], 500);
        }
    }
}