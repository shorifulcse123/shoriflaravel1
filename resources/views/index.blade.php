  @extends('welcome')
@section('content')
<!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

        @foreach($post as $row)
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              {{$row->name}}
            </h2>
            <img src="{{URL::to($row->image)}}" style="height: 300px; width: 600px;">
            <h2 class="post-title">
              {{$row->title}}
            </h2>
            <h3 class="post-subtitle">
             {{$row->details}}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Shoriful islam</a>
            on {{$row->created_at}}</p>
        </div>
        <hr>
        @endforeach

        {{$post->links()}}
       
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <hr>

@endsection