<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
        public function logout(){
            Auth::logout();
            return redirect("/login")->with('success','Anda Berhasil Logout');
        }
}
