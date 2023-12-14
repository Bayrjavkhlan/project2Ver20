<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userView(Request $request)
    {
        $name = $request->input('name');
        return view('user/main', compact('name'));
    }
    public function display()
    {
        $dbController = new DBController();
        $books = $dbController->displayAllBookMainReturn();
        return view('user\main', ['name' => null, 'bookMains' => $books]);            
    }


}
