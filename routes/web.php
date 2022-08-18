<?php

use App\Models\{Book,Story};
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resources([
    'book' => \App\Http\Controllers\BookController::class,
    'bookshelf' => \App\Http\Controllers\BookShelfController::class,
    'profile' => \App\Http\Controllers\ProfileController::class,
    'story' => \App\Http\Controllers\StoryController::class,
    'feedback' => \App\Http\Controllers\FeedbackController::class,
]);
Route::post('search',function (Request $request)
{
    $book = Book::where('title', 'LIKE', '%'.$request->input('query').'%')->get();
    $story = Story::where('title', 'LIKE', '%'.$request->input('query').'%')->get();
    return view('search')->with('books',$book)->with('stories',$story);
})->name('search');
Route::middleware('auth')->get('mybooks',function (Request $request)
{
    if (auth()->user()->is_admin)
    {
        return view('mybooks',['books' => Book::where('publisher','=',auth()->user()->id)->simplePaginate(5)]);
    }else{
        abort(404);
    }
})->name('mybooks');

Route::middleware('auth')->get('mystories',function (Request $request)
{
    if (auth()->user()->is_admin)
    {
        return view('mystories',['stories' => Story::where('author','=',auth()->user()->id)->simplePaginate(5)]);
    }else{
        abort(404);
    }
})->name('mystories');
