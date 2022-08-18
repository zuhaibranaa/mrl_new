<?php

namespace App\Http\Controllers;

use App\Models\{BookShelf,Book,Story,Status};
use Illuminate\Http\Request;

class BookShelfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookShelf = BookShelf::all()->where('user','=',auth()->user()->id);
        $books = [];
        $stories = [];
        foreach ($bookShelf as $item){
            if ($item->story == null){
                array_push($books,[...Book::find($item->book)->toArray(),'status'=>Status::find($item->status)->name]);
            }else{
                array_push($stories,[...Story::find($item->story)->toArray(),'status'=>Status::find($item->status)->name]);
            }
        }
//        dd($books[0]);
        return view('bookshelf',[
            'books' => $books,
            'stories' => $stories,
        ]);
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
        $bookShelf = new BookShelf();
        $bookShelf['user'] = auth()->user()->id;
        $bookShelf['book'] = $request->book;
        $bookShelf['story'] = $request->story;
        $bookShelf['status'] = $request->status;
        $bookShelf->save();
        return redirect('bookshelf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->type == 'book'){
            $bookshelf = BookShelf::where('book','=',$id)->where('user','=',auth()->user()->id);
        }else{
            $bookshelf = BookShelf::where('story','=',$id)->where('user','=',auth()->user()->id);
        }
        $bookshelf->delete();
        return redirect()->back();
    }
}
