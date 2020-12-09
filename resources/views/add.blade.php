@extends('welcome')
@section('content')
<!-- Main Content -->
  <div class="container">

    
      <a href="{{route('add.categories')}}" class="btn btn-primary">Add Categories</a>
      <a href="{{route('view.categories')}}"class="btn btn-warning">All Categories</a>
      
   

    <hr>



                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                      @endif


                      

    <p class="text-center text-primary">Welcome To Add Categorie Page!!</p>


            <form action="{{route('store.categorie')}}" method="post">
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1"> Categorie Name</label>
                      <input type="text" class="form-control" placeholder="Enter your categorie name" name="name">
                      
                    </div>

                    
                     

                    <div class="form-group">
                      <label for="exampleInputEmail1">Slug Name</label>
                      <input type="text" class="form-control" placeholder="Enter your slug name"  name="slug">
                      
                    </div>

                    
                    
                    
                    <button type="submit" class="btn btn-primary">Add Post</button>
          </form>
    
  </div>

@endsection