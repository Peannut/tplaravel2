<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    //

    public function index()
    {
      return view('admin');

    }
    public function showblogs()

    {
       $blogs = DB::table('blogs')->get();
         return view('adminshow',['blog' => $blogs]);
        // return $blogs;
    }

    public function confirm( $id){


        DB::table('blogs')
              ->where('id', $id)
              ->update(['confirmation' => true]);

           return redirect()->route('admin.show');
    }


}
