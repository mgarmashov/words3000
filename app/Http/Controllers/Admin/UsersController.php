<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function showPage()
    {
        return view('admin.users', ['header' => 'Users']);
    }

    public function showList()
    {
        $users = User::all()->toArray();
        return response()->json($users);
    }
}
