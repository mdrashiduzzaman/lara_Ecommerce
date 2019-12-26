@extends('layouts.adminmaster')
@section('title') Author Post @endsection
@section('content')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit "></i> New Post</h1>
          <p>write here what is in your mind</p>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-12 ">
          <div class="tile">
           
            <div class="tile-body">
            @if(Session::has('success'))
        <div class="btn btn-success">
        {{Session::get('success')}}
        </div>

        @endif 
        @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>

                    @endforeach
                  </ul>
                </div>

                @endif
              <form method="post" action="{{route('editPost', $post->id)}}">@csrf
                <div class="form-group">
                  <label class="control-label">Title</label>
                  <input name="title" class="form-control" type="text" value="{{Auth::user()->name}}">
                </div>
                
                <div class="form-group">
                  <label class="control-label">Description</label>
                  <textarea name="content" class="form-control" rows="4" placeholder="Enter your Post Description"></textarea>
                </div>
                <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
              &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
              </div>
              </form>
            </div>
            
          </div>
        </div>
       
        <div class="clearix"></div>
        
      </div>
    </main>
@endsection