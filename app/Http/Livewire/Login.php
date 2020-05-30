<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;

class Login extends Component
{

    public $email,$password;
	
    public function dologin()
    {
        $this->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $data = [
            'email' => $this->email,
            'password' => $this->password
        ];

        if(Auth::attempt($data)){
            return redirect(route('home'));
        }
        else{
            return back()->with('error','Wrong login details');
        }
       
    }

    public function render()
    {
        return view('livewire.login');
    }
}
