@extends('welcome')
@section('content')
<!-- Main Content -->
  <div class="container">

    
      <a href="{{route('add.categories')}}" class="btn btn-primary">Add Categories</a>
      <a href="{{route('view.categories')}}"class="btn btn-warning">All Categories</a>
      
   

    <hr>

    <p class="text-center text-primary">Welcome To Single View Page!!</p>


    <ul>
      <li>Categorie Name:{{$categorie->name}}</li>
       <li>Categorie Slug:{{$categorie->slug}}</li>
       <li>Categorie Created:{{$categorie->created_at}}</li>
       <li>Categorie Created:{{$categorie->updated_at}}</li>
    </ul>

   


                      
                      
                      
                    

  
    
  </div>

@endsection