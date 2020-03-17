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
        $data = $this->getWords();
        return view('index', ['data' => $data]);
    }

    public function favorite(Request $request)
    {
        $data = $this->getWords(true, 20);
        return view('index', ['data' => $data]);
    }

    private function getWords($onlyFavorite = false, $itemsForPage = 100)
    {
        $data = Word::query();

        if ($onlyFavorite == true) {
            $data = $data->favorite();
        }

        $data = $data->paginate($itemsForPage);

        foreach ($data as $word){

            $word->oxfordNormalized = $word->oxfordData();
            if (Auth::check()){
                $word->isFavorite = Auth::user()->words()->find($word->id);
            }

        }

        return $data;
    }
}
