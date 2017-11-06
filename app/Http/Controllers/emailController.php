<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\Emails;
use App\Password;

class emailController extends Controller
{
  public function newuser(Request $request) {
    // registreren van een nieuwe email gebruiker
    $this->email = $request->create_email;
    $this->validate($request, [
      'create_email' => 'max:15|min:3|required|unique:emails,email',
    ]);
    Emails::create(['email' => $request->create_email]);
    $data = Password::orderby('updated_at', 'desc')->first();

    mail::send('email.welkom', ['data' => $data, 'user' => $this->email], function($message){
      $message->to(
        $this->email."@ziekenhuis-rotterdam.nl", null
        )->subject('Welkom tot de applicatie van Ziekenhuis-rotterdam');
    });
    return redirect()->back();
  }

  public function deleteuser(Request $request) {
    $this->email = Emails::where('id', $request->delete_email)->first();
    Emails::find($request->delete_email)->delete();
    mail::send('email.bye', ['email' => $this->email->email], function($message){
      $message->to(
        $this->email->email, null
        )->subject('Uitgeschreven voor de applicatie Ziekenhuis-rotterdam');
    });
    return redirect()->back();
  }
}
