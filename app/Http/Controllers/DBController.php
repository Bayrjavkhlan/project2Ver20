<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DBController extends Controller
{
    public function displayAllBookMain() {
        $bookMains = DB::table('book_main')->get();

        $name = "John Doe";
    
        return view('user/main', compact('bookMains', 'name'));
    }
    public function displayAllBookMainReturn() {
        $bookMains = DB::table('book_main')->get(); 
        return $bookMains;
    }
    
    public function showBookDetails($id) {
        $bookDetails = DB::table('book')
            ->join('book_main', 'book_main.id', '=', 'book.book_main_id')
            ->select('book_main.*', 'book.*')
            ->where('book_main.id', $id)
            ->get();
    
        return view('user/details', compact('bookDetails'));
    }
    public function userInfoDisplay(Request $request){
        $email = session('email');
        $user = DB::table('users')->where('email', $email)->first();
        $userDetail = DB::table('user_detail')->where('userid', $user->id)->first();
        $result = DB::table('users')
        ->join('user_detail', 'users.id', '=', 'user_detail.userid')
        ->select('users.id', 'users.name', 'users.email', 'user_detail.accountid', 'user_detail.firstname', 'user_detail.lastname', 'user_detail.address', 'user_detail.phoneNumber', 'user_detail.register')
        ->where('users.email', '=', $email)
        ->get();
        return view('user/user-info',compact('result'));
        // $account = DB::table('accounts')->get()->where();
        // return  compact($account);
    }
    public function accountDisplay(Request $request)
    {
        $email = session('email');
        
        $result = DB::table('users')
            ->join('user_detail', 'users.id', '=', 'user_detail.userid')
            ->select('user_detail.accountid')
            ->where('users.email', '=', $email)
            ->first(); // Use first() to get a single result or null
    
        if ($result) {
            // If $result is not null, fetch the corresponding account
            $acc = DB::table('account')->where('id', $result->accountid)->first();
        } else {
            // If $result is null, set $acc to null or an empty array, depending on your needs
            $acc = null;
        }
    
        // Pass $acc to the view
        return view('user/account', compact('acc'));
    }
    public function searchBook(Request $request)
    {
        $searchQuery = $request->input('search');

        // Perform the search using $searchQuery
        $filteredBooks = DB::table('book_main')
            ->where('title', 'like', '%' . $searchQuery . '%')
            ->orWhere('author', 'like', '%' . $searchQuery . '%')
            ->get();

        return view('user/searchBook', ['searchQuery' => $searchQuery, 'filteredBooks' => $filteredBooks]);
    }
    
    

    

}
