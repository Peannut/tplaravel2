<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ImgController extends Controller
{
    public function index(Request $request) {
// validtion des donnéées --------------
                $request->validate([
                    'image' => 'required|mimes:png,jpg,jpcg',
                    'title' => 'required',
                    'article' => 'required'
                ]);
//modifier le nom de l'images -------------
              $imageName = date('y-m-d') . "_". random_int(1 , 60) .".".
                           $request->file('image')->getClientOriginalExtension();
// inseré l'article dans la base de données -------------

        blog::create([
            'title' => $request->input('title'),
            'article' => $request->input('article'),
            'image' => $imageName,
            'user_id' => Auth::user()->id,
            'confirmation' => false
        ]);
// transfer d'limages public path -----------------
        $request->file('image')->move(public_path('storage/images'),$imageName);
       // Storage::disk('public')->put($request->getFilename().'.'.$extension,  File::get($cover));

            return redirect()->route('home');
    }
}
