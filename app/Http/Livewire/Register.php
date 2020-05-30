<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

class Register extends Component
{	

	public $name,$email,$password,$password_confirmation;

    public function rest(){
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->password_confirmation = "";
    }

    public function store()
    {   

        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->rest();
        return redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.register');
    }
}
