@extends('welcome')
@section('content')
<!-- Main Content -->
  <div class="container">

    
      <a href="{{route('add.categories')}}" class="btn btn-primary">Add Categories</a>
      <a href="{{route('view.categories')}}"class="btn btn-warning">All Categories</a>
      
   

    <hr>

    <p class="text-center text-primary">Welcome To View Page!!</p>

    <table class="table table-dark text-center">
              <thead>
                    <tr>
                      <th scope="col">Serial NO.</th>
                      <th scope="col">Categorie Name</th>
                      <th scope="col">Categorie Slug</th>
                      <th scope="col">Create Time</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categorie as $row)
                    <tr>
                      <th >{{$row->id}}</th>
                      <td>{{$row->name}}</td>
                      <td>{{$row->slug}}</td>
                      <td>{{$row->created_at}}</td>
                      <td>
                        <a href="{{URL::to('edit/post'.$row->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{URL::to('Delete/post'.$row->id)}}" class="btn btn-danger">Delete</a>
                        <a href="{{URL::to('single/post'.$row->id)}}" class="btn btn-success">View</a>
                        

                        
                      </td>
                    </tr>

                    @endforeach
                    
                    
              </tbody>
   </table>


  
    
  </div>

@endsection