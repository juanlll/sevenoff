<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Bienvenida extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from = "bienvenido@gmail.com";
        $name = " el admin";
        $subject ="Bienvenido a sevenoff";

        return $this->view('name',['nombre'=>'Amigo'])->from($from,$name)->subject($subject);
    }
}
