<?php
// app/Http/Controllers/EmailController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\GreetingsMail;

class EmailController extends Controller
{
    public function sendGreetingsEmail()
    {
        $senderName = "Nurfauziah";
        $receiverName = "Sopia";

        Mail::to('tujuan@example.com')->send(new GreetingsMail($senderName, $receiverName));

        return "Email berhasil dikirim!";
    }
}
