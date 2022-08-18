<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Feedback;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getRating = function ($BookId){
            $num = 0;
            $stars = 0;
            foreach (Feedback::where('book',$BookId)->get() as $feedback){
                $stars += $feedback->rating;
                $num++;
            }
            $num ? $totalStars = (int)round(($stars / $num), 0):$totalStars = 0;
            return [$totalStars,$num];
        };
        $books = Book::cursorPaginate(5);
        return view('bookslist',compact('books'))->with('getRating',$getRating);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->date = $request->date;
        $book->genre = $request->genre;
        $book->publisher = auth()->user()->id;

        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->move(public_path().'/images/', $filename);
            $userimage = $filename;
        }
        $book->image = $userimage;
        $book->save();
        return redirect('book')->with('message','Resource Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  Book  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $feedbacks = Feedback::where('book',$book->id)->get();
        $num = 0;
        $stars = 0;
        foreach ($feedbacks as $feedback){
            $stars += $feedback->rating;
            $num++;
        }
        $num ? $totalStars = (int)round(($stars / $num), 0):$totalStars = 0;
        return view('singlebook')->with('book',$book)->with('feedback',$totalStars);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->date = $request->date;
        $book->genre = $request->genre;

        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->move(public_path().'/images/', $filename);
            $userimage = $filename;
        }
        $book->image = $userimage;
        $book->save();
        return redirect('book')->with('message','Resource Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Book  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete() ? $message = 'Book Deleted Successfully':$message = 'Deletion Failed';
        return redirect()->back()->with('message',$message);
    }
}
