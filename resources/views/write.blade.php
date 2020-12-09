@extends('welcome')
@section('content')
 <div class="container">
   <div class="row">
     <div class="col-lg-8 col-md-10 mx-auto">
       
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

       <form action="{{ route('store.post.posts') }}" method="post" enctype="multipart/form-data">
        @csrf
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label>Post Title</label>
             <input type="text" class="form-control" placeholder="Title" name="title" required >
           </div>
         </div>
         <br>
          <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label>Category</label>
            <select class="form-control" name="cat_id">
              @foreach($categorie as $row)
              <option value="{{ $row->id }}">{{ $row->name }}</option>
              @endforeach
            </select>
           </div>
         </div>
         <br>
         <div class="control-group">
           <div class="form-group col-xs-12 floating-label-form-group controls">
             <label>Post Image</label>
             <input type="file" class="form-control"  required name="image">
             
           </div>
         </div>
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label>Post Details</label>
             <textarea rows="5" class="form-control" placeholder="Details"  required name="details"></textarea>
            
           </div>
         </div>
         <br>
         <div id="success"></div>
         <div class="form-group">
           <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
         </div>
       </form>
     </div>
   </div>
</div>
@endsection