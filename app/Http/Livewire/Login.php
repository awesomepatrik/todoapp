<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    protected  $listeners = ['closeAlert'];

    public $email, $password;
    public $message = '';
    public $error = false;

    public function render()
    {
        return view('livewire.login');
    }


    public function login()
    {
        $validatedFields = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $credentials = array(
            'email' => $this->email,
            'password' => $this->password
        );

        if (Auth::attempt($credentials)) {
            $this->error = false;
            $this->message = 'You are Login successful';
            return redirect("todo-list");
        } else {
            $this->error = true;
            $this->message = 'email and password are wrong.';
        }
    }


    public function githubLogin(){
        return redirect('/auth/github');
    }

    public function closeAlert(){
        $this->error = false;
    }
}
