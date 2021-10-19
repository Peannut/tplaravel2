@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">

        <table class="table table-hover">

            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">article</th>
                <th scope="col">user_id</th>
                <th scope="col">confirmation</th>
                <th>confirmé</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($blog as $item )
              <tr>
                <td>{{ $item->id}}</td>
                <td>{{ $item->title}}</td>
                <td>{{ $item->article}}</td>
               <td>{{ $item->user_id}}</td>
               <td>{{ $item->confirmation}}</td>
               <td> <a href="{{  route('blog.confirm',['id' => $item->id])}}" class="btn btn-success">Confirm</a></td>
               <td><a href="{{ route('blog.edit',['blog' => $item->id ])}}" class="btn btn-danger"> delete</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>

    </div>
</div>

@endsection
