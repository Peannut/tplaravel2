@extends('layouts.app')

@section('content')

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img height="500px;" src="https://www.vapulus.com/ar/wp-content/uploads/2018/07/Information-on-blogs-and-blogs.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img height="500px;" src="https://authoughthome.files.wordpress.com/2019/09/benefits-of-blogging-1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img height="500px;" src="https://www.redacteur.com/blog/wp-content/uploads/2020/09/redacteur-blog-img-une-inspiration-blog-content-marketing-740x522.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<br>
<div class="col-lg-9">
          <div class="row">
            @foreach ($blog as $item)

            <div class="card col-lg-4 col-sm-12"  >

              <!--  <img src="https://cdn.discordapp.com/attachments/399589479720943651/862156512936198144/photo-1493612276216-ee3925520721.jpg" class="card-img-top" alt="..."> -->
             <!-- <img src="images/{{$item->image}}" class="card-img-top" alt="..."> -->

              <img src="{{ asset('/storage/images/'.$item->image) }}" class="card-img-top" alt="...">

              <div class="card-body">
                <h5 class="card-title"> {{$item->title}}</h5>
                <p class="card-text"> {{$item->article}}</p>

                <h3 class="blockquote-footer"> auteur:{{ $item->user_id}}</h3>
                <a href="{{ route('blog.show',['blog' => $item->id ])}}" class="btn btn-primary">Show More </a>

                @if ( Auth::check() && (Auth::user()->id == $item->user_id) )
                   <a href="{{ route('blog.edit',['blog' => $item->id ])}}" class="btn btn-danger">Delete </a>
                @endif




                </div>
                </div>


                @endforeach
          </div>

        </div>

@endsection
