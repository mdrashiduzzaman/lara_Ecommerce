<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\createPost;

class adminController extends Controller
{
    public function __construct() {
        $this->middleware('checkRole:admin');
    }
  public function dashboard() {
      return view('admin.dashboard');
  }
  public function posts() {
      $posts = post::all();
    return view('admin.posts', compact('posts'));
}
public function comments() {
    return view('admin.comments');
}
public function users() {
    return view('admin.users');
}
public function adminEditPost($id){
    $post = Post::where('id', $id)->first();
    return view('admin.adminEditPost', compact('post'));
}
public function adminUpdatePost(createPost $request, $id){
    $post = Post::where('id', $id)->first();
   $post->title = $request['title'];
   $post->content = $request['content'];
   $post->save();
   return back()->with('success', 'Post Updated successfully');
}
public function adminDeletePost($id){
    $post = Post::where('id', $id)->first();
   $post->delete();
    return back();
}
}
