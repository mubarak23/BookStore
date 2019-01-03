<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = "Available Books for Borroww";
        $list_books = Book::paginate(10);
        $book_count = Book::count();
        return view('main_home')->with(['title' => $title, 'list_books' => $list_books, 'book_count' => $book_count]);
    }
}
