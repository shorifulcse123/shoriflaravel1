@extends('welcome')
@section('content')
 <div class="container">
   <div class="row">
     <div class="col-lg-14  mx-auto">
       
        <a href="{{route('add.categories')}}" class="btn btn-primary">Add Categories</a>
      <a href="{{route('view.categories')}}"class="btn btn-warning">All Categories</a>
      <a href="{{route('allview.categories')}}"class="btn btn-success">All Post</a>
        
       
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

      

    <p class="text-center text-primary">Welcome To View Page!!</p>

    <table class="table table-dark text-center">
              <thead>
                    <tr>
                      <th scope="col">Serial NO.</th>
                      <th scope="col">Categorie Name</th>
                      <th scope="col">Categorie title</th>
                      <th scope="col">Categorie details</th>
                       <th scope="col">Categorie image</th>
                      <th scope="col">Create Time</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($post as $row)
                    <tr>
                      <th >{{$row->id}}</th>
                      <th >{{$row->name}}</th>
                      <td>{{$row->title}}</td>
                      <td>{{$row->details}}</td>
                      <td><img src="{{URL::to($row->image)}}"style="height: 40px;width: 40px" ></td>
                      <td>{{$row->created_at}}</td>
                      <td>
                        <a href="{{URL::to('view/edit/post'.$row->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{URL::to('Delete/image/post'.$row->id)}}" class="btn btn-danger">Delete</a>
                        <a href="{{URL::to('view/single/post'.$row->id)}}" class="btn btn-success">View</a>
                        

                        
                      </td>
                    </tr>

                    @endforeach
                    
                    
              </tbody>
   </table>
     </div>
   </div>
</div>
@endsection