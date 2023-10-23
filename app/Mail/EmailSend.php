<?php



namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailSend extends Mailable
{
    use Queueable, SerializesModels;

    protected $details;

    public function __construct($data)
    {
        $this->details = $data;
    }

    public function build()
    {
        return $this->view('email.sendmail')
                    ->with(['details' => $this->details]);
    }
}

