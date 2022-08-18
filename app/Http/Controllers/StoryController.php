<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::cursorPaginate(5);
        return view('storieslist',compact('stories'));
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
        $story = new Story();
        $story['title'] = $request->title;
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->move(public_path().'/images/', $filename);
            $image = $filename;
            $story['image'] = $image;
        }
        $story['content'] = $request->contents;
        $story['description'] = $request->description;
        $story['author'] = auth()->user()->id;
        $story['genre'] = $request->genre;
        $story->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  Story  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        return view('singlestory')->with('story',$story);
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
     * @param  Story  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        $story['author'] = auth()->user()->id;
        $story['title'] = $request->title;
        $story['description'] = $request->description;
        $story->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Story  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $story->delete();
        return redirect()->back();
    }
}
