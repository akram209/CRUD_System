@extends('layouts.app')
@section('title')
show
@endsection
@section('content')
    
        <div class="card m-5">
            <div class="card-header">
             php info
            </div>
            <div class="card-body">
              <h5 class="card-title">Title:{{$post->title}}</h5>
              <p class="card-text">Discription :{{$post->description}}</p>
            </div>
          </div>
          
          <div class="card m-5">
            <div class="card-header">
              Post Creator Info
            </div>
            <div class="card-body">
              <h5 class="card-title">Name : {{$post->user->name}}</h5>
              <p class="card-text">Email: ahmedhesham209@gamil.com</p>
              <p class="card-text">Created at : {{$post->created_at}}</p>

            
          </div>
    </div>
   @endsection