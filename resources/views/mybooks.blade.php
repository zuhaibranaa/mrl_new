@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-2 mt-5">
            @include('components.sidebar')
        </div>
        <div class="col-md-10">
    <div class="container">
        <div class="row px-5 justify-content-between">
            <div class="col-md-3 px-5">
                <h3 class="text-primary">All Books</h3>
            </div>
            <div class="col-md-3 px-5 mb-3">
                @if(Auth::check() && auth()->user()->is_admin)
                    @include('components.addNewBook')
                @endif
            </div>
        </div>
        @if(!$books)
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    <div class="alert alert-danger" role="alert"> No Book Found </div>
                </div>
            </div>
        @else
            @foreach($books as $book)
                <div class="d-flex justify-content-center row pt-2">
                    <div class="col-md-10">
                        <div class="row p-2 bg-white border rounded">
                            <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{asset('images/'.$book->image)}}"></div>
                            <div class="col-md-6 mt-1">
                                <h5>{{$book->title}}</h5>
                                <div class="d-flex flex-row">
                                    <div class="ratings mr-2">
{{--                                        @for($i = 0;$i < $getRating($book->id)[0];$i++)--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        @endfor--}}
                                    </div>
{{--                                    <span class="mx-2">{{$getRating($book->id)[1]}} Feedbacks</span>--}}
                                </div>
                                <div class="mt-1 mb-1 spec-1">
                                    <span>{{$book->description}}</span>
                                </div>
                                <p class="text-justify text-truncate para mb-0">{{\App\Models\Category::find($book->genre)->name}}<br><br></p>
                            </div>
                            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                <div class="d-flex flex-row align-items-center">
                                    <h4 class="mr-1">{{$book->author}}</h4>
                                </div>
                                <h6 class="text-success">{{\App\Models\User::find($book->publisher)->name}}</h6>
                                <form id="{{'delete-'.$book->id}}" method="POST" action="{{ route('book.destroy',parameters: $book->id) }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <div class="d-flex flex-column mt-4">
                                    <a class="btn btn-primary btn-sm mt-5" href="{{ route('book.show',parameters: $book->id) }}" >Details</a>
                                    <button class="btn btn-danger btn-sm mt-2" onclick="{
                                    document.querySelector('#{{'delete-'.$book->id}}').submit()
                                }">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="d-flex justify-content-center mt-5">
        {!! $books->links() !!}
    </div>
        </div>
    </div>
@endsection
