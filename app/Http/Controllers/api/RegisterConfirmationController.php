<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterConfirmationController extends Controller
{
    public function index(){

            $user= User::where('confirmation_token',\request('token'))->first();
            if (! $user){

                return redirect('/posts')->withFlash('unknown token');
            }
            $user->confirm();


        return redirect('/posts')->withFlash('your account is now confirmed');

    }
}
