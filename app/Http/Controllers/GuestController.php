<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    public function getLogin(){
      return view('login');
    }
    public function getRegister(){

    }
    public function getHome(){
      return view('index');
    }

}
