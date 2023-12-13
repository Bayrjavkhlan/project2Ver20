<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userView(Request $request)
    {
        $name = $request->input('name');
        return view('user/main', compact('name'));
    }

}
