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
]);
Route::get('/dashboard', function () {
    return redirect(url('/'));
});
Route::post('search',function (Request $request)
{
    $book = Book::where('title', 'LIKE', $request->input('query'))->get();
    $story = Story::where('title', 'LIKE', $request->input('query'))->get();
    return [$story,$book];
//    return Inertia::render('HomePage',[
//        'book' => $book,
//        'story' => $story,
//        'auth' => auth()->user(),
//    ]
//);
})->name('search');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
