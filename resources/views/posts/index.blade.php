@extends('layouts.app')
  @section('title')
   index
  @endsection
   @section('content')
        <div class="text-center">
            <a href={{route('posts.create')}} class="btn btn-success">create</a>

        </div>
        <div class="text-center m-3">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted by</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->created_at}}</td>
                        <td> 
                            <a href={{route('posts.show',$post->id )}} class="btn btn-primary">view</a>
                            <a href={{route('posts.edit',$post->id)}} class="btn btn-warning">edit</a>
                            <form  method="POST" action={{route('posts.delete',$post->id)}} style="display: inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">delete</button>

                            </form>
                        </td>
                      </tr>
                        
                    @endforeach
                
                  
                </tbody>
              </table>
              @endsection
        </div>

    </div>
