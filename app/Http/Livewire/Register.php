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
    public $message = '';
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

        try{

            $validateFields = $this->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $encryptPassword = Hash::make($this->password);

            User::create(['name' => $this->name, 'email' => $this->email,'password' => $encryptPassword]);

            $this->login();
            $this->error = false;

        }catch(\Exception $exception){
            $this->error = true;
            $this->message = "Error in registration!";
        }

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
