<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
USE Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\Vue;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $blog = DB::table('blogs')->where('confirmation',true)->get();

        return   View('home')->with('blog', $blog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {


       dd($request->input('image'));


        /*
        $blog = $request->all();
        Blog::create(
            [
        'title' => $request->input('title') ,
        'article' => $request->input('article'),
        'image' => $request->input('image'),
        'user_id' => Auth::user()->id,
        'confirmation' => false,
            ]
        );
        //$last = blog::orderBy('id', 'DESC')->get();

        $blogs = DB::table('blogs')->where('confirmation',true)->get();
        return  redirect()->route('home' , ['blog' => $blogs]);

        //return   View('showblog')->with('blog', $last);
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = DB::table('blogs')->where('id',$id)->get();

        $commentaires = DB::table('commentaries')->where('blog_id',$id)->get();
          return View('oneblog',['blog' => $blog , 'commentaire' => $commentaires]);


/*
        $commentaire = DB::table('commentaries')->where('id',$id)->get();
        $blog = DB::table('blogs')->where('id',$id)->get();

        return View('oneblog',['blog'=>$blog,'commentaire'=>$commentaire]);
        */

      /*
        $blog = DB::table('blogs')->where('id',$id)->get();

        return View('home',['blog'=>$blog]);
        //->with('blog', $blog);
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //

            DB::table('blogs')->where('id',$id)->delete();
            return redirect()->route('home');



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        //
        DB::table('blogs')->where('id',$id)->delete();
        return redirect()->route('home');
    }
}
