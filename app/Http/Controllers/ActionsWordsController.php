<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Word;
use Illuminate\Support\Facades\Auth;

class ActionsWordsController extends Controller
{
    public function setFavorite(Request $request)
    {
        $word = Word::findOrFail($request->query('word_id'));
        Auth::user()->words()->attach($word->id);

        return response()->json('good',200);
    }

    public function unsetFavorite(Request $request)
    {
        $word = Word::findOrFail($request->query('word_id'));
        Auth::user()->words()->detach($word->id);

        return response()->json('good',200);
    }
}
