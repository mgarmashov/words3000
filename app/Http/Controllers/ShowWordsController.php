<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Word;
use Illuminate\Support\Facades\Auth;

class ShowWordsController extends Controller
{
    public function index()
    {
        $data = Word::paginate(30);

        foreach ($data as $word){

            $word->oxfordNormalized = $word->oxfordData();
            if (Auth::check()){
                $word->isFavorite = Auth::user()->words()->find($word->id);
            }

        }

        return view('index', ['data' => $data]);
    }
}
