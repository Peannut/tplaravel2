@extends('layouts.app')

@section('content')

    <div class="container"  style="margin-top:20px;">
        <div class="row" style="margin-bottom: 20px;">
         @foreach ($blog as $item)
               <div class="card col-lg-12 col-sm-12"  >
                   <img src="{{ asset('/storage/images/'.$item->image) }}" class="card-img-top" alt="...">
                   <div class="card-body">
                   <h1 class="card-title text-center"> {{$item->title}}</h1>
                   <p class="card-text"> {{$item->article}}</p>
                   <h3 class="blockquote"> auteur:{{ $item->user_id}}</h3>


            <div >
                    <a href="{{ route('blog.show',['blog' => $item->id ])}}" class="btn btn-primary">Show More</a>

                    <!-- supemmer le blog --------------------->
                    @if ( Auth::check() &&(Auth::user()->id === $item->user_id) ||  Auth::check() && (Auth::user()->role == 'admin') )
                    <a href="{{ route('blog.edit',['blog' => $item->id ])}}" class="btn btn-danger">Delete </a>
                    @endif
                    <br> <br> <br>
         </div>
                 <!-- -------------------------------------------- --------------------->


                   </div>

          </div>


        </div>









        <div>


            <h1 style="color: blueviolet;">
                commentaires
            </h1>

            <form action="{{ route('commentaire')}}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group ">
                    <label for="exampleFormControlInput1">commentaire </label>
                    <div class="row">
                        <textarea class="form-control" name="comments" placeholder="Leave a comments"></textarea>
                        <!-- <input type="text" class="form-control col-lg-6" name="comments" id="" placeholder="commentaires"> -->
                        <input type="hidden" name="id" value="{{ $item->id}}">
                        <input type="submit" class="btn btn-success">
                    </div>

                  </div>

            </form>
            @endforeach
        </div>
    </div>








        <div class="container">
            @foreach ($commentaire as $cm )
            <div style="background-color: rgb(255, 255, 255,0.5);margin-top: 20px;box-shadow: 2px 2px 10px  black; padding:10px" class="col-lg-6">


                 <h5> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                  </svg>  {{$cm->user_name}} </h5>


                  <h3> {{$cm->commentarie}}</h3>

                  <p class="blockquote-footer">{{$cm->created_at}}</p>
            </div>
            @endforeach
        </div>

@endsection
