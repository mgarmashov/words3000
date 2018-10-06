<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Word;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LangController extends Controller
{
    public function index(Request $request)
    {
        $data = Word::query();
        if($request->onlyFavorite == 1) {
            $data = $data->favorite();
        }
        $data = $data->paginate(30);

        foreach ($data as $word){

            $word->oxfordNormalized = $word->oxfordData();
            if (Auth::check()){
                $word->isFavorite = Auth::user()->words()->find($word->id);
            }

        }

        return view('index', ['data' => $data]);
    }

    public function set($locale){
//        dd($locale);
        App::setLocale($locale);
//        $response = new \Illuminate\Http\Response('Set Lang');
//        dd($response);
        return back()->withCookie(cookie()->forever('lang', $locale));


//    dd($locale);
//    dd(App::getLocale());
//        App::setLocale($locale);
//        dd(App::getLocale());
//        return back();
//
//    })->name('lang');
    }
}
