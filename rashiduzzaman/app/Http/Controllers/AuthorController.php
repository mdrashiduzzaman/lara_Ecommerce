<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\createPost;
use App\Post;
use Illuminate\Support\Facades\Auth;
class AuthorController extends Controller
{
    public function __construct() {
        $this->middleware('checkRole:author');
    }
  public function dashboard(){
      return view('author.dashboard');
  }
  public function posts(){
    return view('author.posts');
}
public function comments(){
    return view('author.comments');
}
public function newPost(){
    return view('author.newPost');
}
public function createPost(createPost $request){
   $post = new Post();
   $post->title = $request['title'];
   $post->content = $request['content'];
   $post->user_id = Auth::id();
   $post->save();
   return back()->with('success', 'Post created successfully');
}
public function editPost($id){
    $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
    return view('author.editPost', compact('post'));
}
public function updatePost(createPost $request, $id){
    $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
   $post->title = $request['title'];
   $post->content = $request['content'];
   $post->user_id = Auth::id();
   $post->save();
   return back()->with('success', 'Post Updated successfully');
}
public function deletePost($id){
    $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
   $post->delete();
    return back();
}
}
