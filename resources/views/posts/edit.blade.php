@extends('layouts.app')
@section('title')
edit
@endsection
@section('content')

<form method="POST"  action={{route('posts.update',$post->id)}}>
  @csrf
  @method('PUT')
    <div class="mb-3">
      @error('title')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
      <label for="exampleInputEmail1" class="form-label">Title</label>
      <input type="text" name="title" class="form-control" value={{$post->title}} id="exampleInputEmail1" aria-describedby="emailHelp">
      
    </div>
    <div class="mb-3">
      @error('description')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$post->description}}</textarea>
      </div>
      @error('post_creator')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
      <label class="form-label">Post Creator</label>
      <select class="form-select" name="post_creator" aria-label="Default select example">
        @foreach($users as $user)
        <option @selected($user->id==$post->user_id) value={{$user->id}}>{{$user->name}}</option>
       @endforeach
      </select>
   
    <button type="submit" class="btn btn-primary">update</button>
  </form>
  @endsection