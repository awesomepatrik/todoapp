<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    protected $listeners = ['closeAlert'];

    public $email;
    public $password;
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6'
    ];


    public $errorMessage = '';
    public $error = false;

    public function render()
    {
        return view('livewire.login');
    }


    public function login()
    {
        $this->validate();

        $credentials = array(
            'email' => $this->email,
            'password' => $this->password
        );

        if (Auth::attempt($credentials)) {
            $this->error = false;
            $this->errorMessage = 'You are Login successful';
            return redirect("todo-list");
        } else {
            $this->error = true;
            $this->errorMessage = 'email and password are wrong.';
        }
    }


    public function githubLogin(){
        return redirect('/auth/github');
    }

    public function closeAlert(){
        $this->error = false;
    }
}
