<?php

namespace App\Http\Controllers;
use App\Book;
use App\Category;

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
        $list_books = Book::all();
        $all_category = Category::all(); 
        //return $all_category;

        $book_count = Book::count();
        return view('main_home')->with(['title' => $title, 'list_books' => $list_books, 'book_count' => $book_count, 'list_category' => $all_category]);
    }
}
