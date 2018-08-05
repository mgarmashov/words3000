<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;

class ShowWordsController extends Controller
{
    public function welcome()
    {
        $data = Word::paginate(30);
//        $data = Word::all();
        foreach ($data as $word){
            $word->oxfordNormilized = $word->oxfordData();
        }

        return view('index', ['data' => $data]);
    }
}
