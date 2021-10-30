<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    protected $listeners = ['closeAlert'];

    public $name, $email, $password, $confirm_password ;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'min:6|required_with:confirm_password|same:confirm_password',
        'confirm_password' => 'min:6'
    ];
    public $errorMessage = '';
    public $error = false;

    public function render()
    {
        return view('livewire.register');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->confirm_password = '';
    }

    public function register(){


        $this->validate();

        $encryptPassword = Hash::make($this->password);

        User::create(['name' => $this->name, 'email' => $this->email,'password' => $encryptPassword]);

        $this->login();
        $this->error = false;


    }

    public function login(){
        $credentials = array(
            'email' => $this->email,
            'password' => $this->password
        );

        if (Auth::attempt($credentials)) {
            $this->error = false;
            $this->message = 'You are Login successful';
            $this->resetInputFields();
            return redirect("todo-list");
        } else {
            $this->error = true;
            $this->message = 'email and password are wrong.';
        }
    }

    public function closeAlert(){
        $this->error = false;
    }
}
