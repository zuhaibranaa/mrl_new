@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row px-5 justify-content-between">
            <div class="col-md-3 px-5">
                <h3 class="text-primary">All Stories</h3>
            </div>
            <div class="col-md-3 px-5 mb-3">
                @if(Auth::check())
                    @include('components.addNewStory')
                @endif
            </div>
        </div>
        @foreach($stories as $story)
            <div class="d-flex justify-content-center mt-2 row">
                <div class="col-md-10">
                    <div class="row p-2 bg-white border rounded">
                        <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{asset('images/'.$story->image)}}"></div>
                        <div class="col-md-6 mt-1">
                            <h5>{{$story->title}}</h5>
                            <div class="d-flex flex-row">
                                <div class="ratings mr-2">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <span>310</span>
                            </div>
                            <div class="mt-1 mb-1 spec-1">
                                <span>{{$story->content}}</span>
                            </div>
                            <div class="mt-1 mb-1 spec-1">

                            </div>
                            <p class="text-justify text-truncate para mb-0">{{$story->description}}<br><br></p>
                        </div>
                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                            <div class="d-flex flex-row align-items-center">
                                <h4 class="mr-1">{{\App\Models\Category::find($story->genre)->name}}</h4>
                            </div>
                            <h6 class="text-success">{{\App\Models\User::find($story->author)->name}}</h6>
                            <h6 class="text-success">{{$story->created_at->format('d M Y')}}</h6>
                            <div class="d-flex flex-column mt-4">
                                <a class="btn btn-primary btn-sm mt-5" href="{{ route('story.show',parameters: $story->id) }}">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-2">
        {!! $stories->links() !!}
    </div>
@endsection
