<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
  public function getUsersList(){
    $usersList = User::get();
    return view('admin-view.users-management')->with('users',$usersList);
  }
  public function changeRole($role_id, $user_id){
    $user = User::where('id',$user_id)->first();
    $user->role = $role_id;
    $user->save();
    $usersList = User::get();
    $notification['message'] = "You have been changed user ".$user->email."'s role to ";
    if($role_id == 0){
      $notification['message'] = $notification['message']."student.";
    }
    else{
      $notification['message'] = $notification['message']."admin.";
    }
    $notification['condition'] ="Success";
    return view('admin-view.users-management')->with('users',$usersList)->with('notification', $notification);
  }
}
