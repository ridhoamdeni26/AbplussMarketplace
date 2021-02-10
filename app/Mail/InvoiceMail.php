<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Auth;
use Carbon\Carbon;
use DB;
use Cart;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $cart = Cart::content();
        $mytime = Carbon::now();
        $date = $mytime->format('d-m-Y');
        $info = $this->data;
        return $this->from('admin@abpluss.co.id')->view('mail.invoice',compact('info','cart'))
                    ->subject('Product Buy Successfully');
    }
}
