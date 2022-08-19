<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Book,Story};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/');
    }
    public function getContentsByCategory($id)
    {
        $book = Book::where('genre', '=',$id)->get();
        $story = Story::where('genre', '=',$id)->get();
        return view('search')->with('books',$book)->with('stories',$story);
    }
}
