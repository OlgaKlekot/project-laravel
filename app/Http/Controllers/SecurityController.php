<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Models\Author;

class SecurityController extends Controller
{
    public function loadUserByUsername($username)
    {
        $user = Author::select('*')->where('users.username', '=', $username)->get()->toArray();
        return current($user);
    }

    public function index()
    {
        return view('mylayouts.registration');
    }


//    public function addUser()
//    {
//        User::insert([
//            'name' => $_POST['userName'],
//            'email' => $_POST['email'],
//            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
//        ]);
//
//        return redirect('/');
//    }
}
