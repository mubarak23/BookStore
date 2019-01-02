<?php

namespace App\Http\Controllers;

use App\Book;
use Response;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $book, $response = [];

    public function _constructor(Book $book){
        $this->book = $book;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * collect book details and validate it
     * @return \Illuminate\Http\Response
     */
    public function create(Request, $request)
    {
        //
        $data = $request->all();
        $validate_data = $request->validate([
                'title' => 'required',
                'category_id'   => 'required'
        ]);

        $store_book = self::store($data);
        
        if($store_book){
            return response($this->response);
        }else{
           $response["message"] = "An Error occured while saving book details";
           $response["status"] = false; 
           return response($this->response);

        }

        /*if($store){
            return Response::json(array(
                    'success' => true,
                    'data'  => $store_book,
                    'message'   => 'Book Successfully Stored'
                ), 500);
        }else{
            return Response::json(array(
                    'success' => true,
                    'message'   => 'Book UnSuccessfully Stored'
                ), 500);
        }*/

    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($data)
    {
        //
        $store_book = $this->book::firstOrCreate([
            "title" => $data["title"],
            "category_id" => $data["category_id"],
            "description"   => $data["description"],
            "book_cover"    => $data["book_cover"],
            "status"        => $data['status']
        ])
        if($store_book){
            $this->response["message"] = "New Book Created";
            $this->response["new_book"] = $store_book;
            $this->response["status"] = true;
            return response($this->response); 
        }
        /*$store_book = New Book;
        $store_book->title = $data['title'];
        $store_book->category_id = $data['category_id'];
        $store_book->description = $data['description'];
        $store_book->book_cover = $data['book_cover'];
        $store_book->status = $data['status'];
        $store_book->save();
        return $store_book;*/

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
