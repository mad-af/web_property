<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminMakeUser extends Mailable
{
    use Queueable, SerializesModels;
    public $details = array();
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        //
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        try{
            return $this->subject('Owner Made An Account for You')->view('emails.NewAcc');
        }
        catch(Exception $e){
            dd($e);
        }
    }
}
