<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    //
    public function gitRedirect()
    {
        return Socialite::driver('github')->redirect();
    }


    public function gitCallback()
    {
        try {

            $user = Socialite::driver('github')->user();

            $searchUser = User::where('github_id', $user->id)->first();

            if($searchUser){

                Auth::login($searchUser);

                return redirect('todo-list');

            }else{
                $gitUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'github_id'=> $user->getId(),
                    'auth_type'=> 'github',
                    'password' => encrypt('gitpwd123')
                ]);

                Auth::login($gitUser);

                return redirect('todo-list');
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
