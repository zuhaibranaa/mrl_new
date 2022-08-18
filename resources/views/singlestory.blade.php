@extends('layouts.app')
@section('content')
    <div class="row align-content-around mx-2">
        <div class="col-md-4">
            <div class="card container pt-2 pb-2 bg-info bg-opacity-10">
                <img src="{{asset('images/'.$story->image)}}" class="rounded"/>
                <button type="button" class="btn mt-2 btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add To Shelf
                </button>
                <button type="button" class="btn mt-2 btn-outline-primary" data-bs-toggle="modal" data-bs-target="#feedBack">
                    Feedback
                </button>
                <!-- Add To Shelf Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="bookShelf" action="{{ route('bookshelf.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="story" value="{{$story->id}}">
                                    <select class="form-select" name="status">
                                        @foreach(\App\Models\Status::all() as $status)
                                            <option value="{{$status->id}}">{{$status->name}}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" form="bookShelf" class="btn btn-primary" value="Save changes"/>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Feedback Model -->
                <div class="modal fade" id="feedBack" tabindex="-1" aria-labelledby="feedBackLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="bookShelf" action="feedback.create" method="POST">
                                    @csrf
                                    <input type="hidden" name="book" value="{{$story->id}}">
                                    <div class="container d-flex justify-content-around">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="stars">
                                                    <input value="5" class="star star-5" id="star-5" type="radio" name="rating"/>
                                                    <label class="star star-5" for="star-5"></label>
                                                    <input value="4" class="star star-4" id="star-4" type="radio" name="rating"/>
                                                    <label class="star star-4" for="star-4"></label>
                                                    <input value="3" class="star star-3" id="star-3" type="radio" name="rating"/>
                                                    <label class="star star-3" for="star-3"></label>
                                                    <input value="2" class="star star-2" id="star-2" type="radio" name="rating"/>
                                                    <label class="star star-2" for="star-2"></label>
                                                    <input value="1" class="star star-1" id="star-1" type="radio" name="rating"/>
                                                    <label class="star star-1" for="star-1"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 card container pt-2 pb-2 bg-info bg-opacity-10">
            <h2 style="color: rgba(17,69,128,0.95)">{{$story->title}}</h2>
            <p>{{$story->description}}</p>
            <div class="justify-content-between d-flex">
                <span class="text-danger">Release Date:</span>
                <span class="text-danger">{{$story->created_at}}</span>
            </div>
            <div class="justify-content-between d-flex">
                <span class="text-warning">Genre:</span>
                <span class="text-warning">{{\App\Models\Category::find($story->genre? $story->genre:1)->name}}</span>
            </div>
            <div class="justify-content-between d-flex">
                <span class="text-danger">Publisher :</span>
                <span class="text-danger">{{\App\Models\User::find($story->author)->name}}</span>
            </div>
{{--            Star Ratings--}}
            <div class="container d-flex justify-content-center">
                <div class="row">
                    <div class="col-md-12">
{{--                        <div class="stars">--}}
{{--                            <input {{ $rating == 5? 'checked' : '' }} disabled class="star star-5" id="rated-star-5" type="radio" name="star"/>--}}
{{--                            <label class="star star-5" for="rated-star-5"></label>--}}
{{--                            <input {{ $rating == 4? 'checked' : '' }} disabled class="star star-4" id="rated-star-4" type="radio" name="star"/>--}}
{{--                            <label class="star star-4" for="rated-star-4"></label>--}}
{{--                            <input {{ $rating == 3? 'checked' : '' }} disabled class="star star-3" id="rated-star-3" type="radio" name="star"/>--}}
{{--                            <label class="star star-3" for="rated-star-3"></label>--}}
{{--                            <input {{ $rating == 2? 'checked' : '' }} disabled class="star star-2" id="rated-star-2" type="radio" name="star"/>--}}
{{--                            <label class="star star-2" for="rated-star-2"></label>--}}
{{--                            <input {{ $rating == 1? 'checked' : '' }} disabled class="star star-1" id="rated-star-1" type="radio" name="star"/>--}}
{{--                            <label class="star star-1" for="rated-star-1"></label>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
