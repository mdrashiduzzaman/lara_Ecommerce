<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdate;
use App\Comment;

class UserController extends Controller
{
  public function dashboard(){
    return view('user.dashboard');
  }
  public function comments(){
    return view('user.comments');
  }
  public function profile(){
    return view('user.userprofile');
  }
  public function profilePost(UserUpdate $request){
  	$user = Auth::user();
  	$user->name = $request['name'];
  	$user->email = $request['email'];
  	$user->save();
  	return back();
  }
  public function deleteComment($id){
    $comment = comment::where('id', $id)->where('user_id', Auth::id())->delete();
    return back();
  }
}
