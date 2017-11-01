<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Password;

class LockScreen extends Controller
{
    public function login(Request $request) {
      $request->session()->forget('locked');
      return view('layouts.lock')->with(compact('emails', 'msg'));
    }

    public function unlock(Request $request){
      $pw = Password::first();
      if($pw->password == $request->unlock) {
        session(['locked' => 'true']);
        return redirect('/1');
      } else {
        return redirect()->back()->withErrors(['msg' => 'Het wachtwoord is verlopen of onjuist!']);
      }
    }
}
