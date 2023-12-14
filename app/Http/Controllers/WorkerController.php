<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function workerView(Request $request)
    {
        $name = $request->input('name');
        return view('worker/workerMain', compact('name'));
    }
    public function workerTest(Request $request){
        $session = "test";
        return view('worker/workerTest',compact('session'));
    }

}