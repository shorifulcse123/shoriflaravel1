@extends('welcome')
@section('content')
<!-- Main Content -->
  <div class="container">

    
      <a href="{{route('add.categories')}}" class="btn btn-primary">Add Categories</a>
      <a href="{{route('view.categories')}}"class="btn btn-warning">All Categories</a>
      
   

    <hr>

  

     <p class="text-center text-primary">Welcome To Single View Post!!</p>


    

      
      <h6>{{$post->name}}</h3>
       <img src="{{URL::to($post->image)}}"style="height: 200px; width: 200px;">
       <h3>{{$post->title}}</h3>
       <p>{{$post->details}}</p>
      
       

   


  
    
  </div>

@endsection