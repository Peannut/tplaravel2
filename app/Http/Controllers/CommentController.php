<?php

namespace App\Http\Controllers;
use App\Models\commentarie;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    //

    public function commentaire(Request $request)
    {

       $data = $request->input('comments');

       commentarie::create([
            'commentarie' => $data,
            'user_name' => Auth::user()->name,
            'blog_id' => $request->input('id')
        ]);

        return redirect() ->back();


    }
}
