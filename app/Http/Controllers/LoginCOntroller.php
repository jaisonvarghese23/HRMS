<?php

namespace App\Http\Controllers;

use App\Models\HR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginCOntroller extends Controller
{
    public function login(){
        return view('login');
    }
    public function dologin(){
        $input=['uname'=> request('uname'),
        'password'=> request('password')];
        if(auth()->attempt($input)){

            return redirect()->route('Dashboard');

        }
        else if(auth()->guard('Employee')->attempt($input)){

            return redirect()->route('EmployeeDashboard');

        }
        else{
            return redirect()->route('login')->with('message',"Invalid Username Or Password");
        }

    }
    public function logout(){

         auth()->logout();
         return redirect()->route('login');

    }
    public function Employeelogout(){

        auth()->guard('Employee')->logout();
        return redirect()->route('login');

   }
}
