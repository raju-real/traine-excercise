<?php

namespace App\Http\Controllers;

use App\Subscriber;
use App\Trainer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $trainers = Trainer::all();
        return view('welcome', compact('trainers'));
    }

    // Subscriber User
    public function subscribe(Request $request) {
        $this->validate($request,['email' => 'required|unique:subscribers']);
        if(Subscriber::where('email', $request->email)->exists()){
            return redirect()->back()->with('error','Already Subscribed');
        }
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();
        return redirect()->route('home')->with('message','Successfully Subscribed');
    }
}
