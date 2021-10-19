@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="row">
     <!--{{ route('blog.create')}}-->
    <form action="{{ route('img')}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('POST')
      <div class="form-group">
        <label for="title">title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter title">
      </div>


        <div class="form-group">
          <label for="article">Example textarea</label>
          <textarea class="form-control" name="article" id="article" rows="3"></textarea>
        </div>

        <div class="form-group">
          <label for="image">image</label>
          <input type="file" class="form-control" id="user_id" name="image" aria-describedby="emailHelp" placeholder="Enter title">
        </div>





      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   </div>
 </div>
@endsection
