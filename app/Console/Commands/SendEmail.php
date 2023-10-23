<?php

namespace App\Console\Commands;

use App\Mail\EmailSend;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $emails=User::pluck('email')->toArray();
        $data=['title'=>'php', 'body'=>'this is laravel'];
        foreach ($emails as $email) {
            Mail::to($email)->send(new EmailSend($data));
        }
    }
}
