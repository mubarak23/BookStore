<?php

namespace App\Http\Controllers;

use App\Book;
use Response;
use Illuminate\Http\Request;

class BookController extends Controller
{
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
        if($store){
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
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
