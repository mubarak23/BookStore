<?php

namespace App\Http\Controllers;

use App\BorrowBook;
use Illuminate\Http\Request;

class BorrowBookController extends Controller
{   
    protected $borrow_book;
    public function _constructor(BorrowBook $borrow_book ){
            $this->borrow_book = $borrow_book;
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
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $data = $request->all();
        $validate_data = $request->validate([
            "user_id"   => "required",
            "book_title" => "required",
            "request_date" => "required"
        ]);

        $process_borrow = self::store($data);
        if($process_borrow){
            return Response::json(array());
        }else{
            return Response::json(array())
        }
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
        $borrow_book = $this->borrow_book::firstOrCreate([
                "user_id" => $data["user_id"],
                "book_id" => $data["book_id"],
                "book_title" => $data["book_title"],
                "request_data" => $data["request_data"];
                "approve_date" => $data["approve_date"];
                "return_date"  => $data["return_date"];
                "status"       => $data["status"];
                "approve_by"   => $data["approve_by"];   
        ]);

        return $borrow_book;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BorrowBook  $borrowBook
     * @return \Illuminate\Http\Response
     */
    public function show(BorrowBook $borrowBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BorrowBook  $borrowBook
     * @return \Illuminate\Http\Response
     */
    public function edit(BorrowBook $borrowBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BorrowBook  $borrowBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BorrowBook $borrowBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BorrowBook  $borrowBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorrowBook $borrowBook)
    {
        //
    }
}
