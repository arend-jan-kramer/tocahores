<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Faker\Generator as Faker;
use App\Password;
use App\Emails;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to al known users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Faker $faker)
    {
        Password::orderby('updated_at', 'desc')->update([
          'password' => $faker->regexify('[A-Z0-9.-]+\[A-Z]{2,4}')
        ]);
        $data = Password::orderby('updated_at', 'desc')->first();
        mail::send('email.updated', ['data' => $data], function($message){
          $emails = Emails::all();
          foreach($emails as $email) {
            $message->to(
              $email->email, null
              )->subject('Wachtwoord update voor de applicatie van Ziekenhuis-rotterdam');
          }
        });

    }
}
