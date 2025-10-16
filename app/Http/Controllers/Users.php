<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Users extends Controller
{
    //
    public function index($user)
    {
        echo " ";
        echo $user;
        echo "\n";
        echo " Hello from index";
        echo "\n";
        return ['name'=>"Aaron", 'age'=>22 ];
    }

    public function loadView($username)
    {
        return view("user", ['user'=>$username]);
    }

    public function loadView2()
    {
        return view("user", ['user'=>'Qwerty']);
    }
}
