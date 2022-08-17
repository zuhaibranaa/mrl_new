@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row px-5 justify-content-between">
            <div class="col-md-3 px-5">
                <h3 class="text-primary">All Stories</h3>
            </div>
            <div class="col-md-3 px-5 mb-3">
                @include('components.addNewStory')
            </div>
        </div>
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="row p-2 bg-white border rounded">
                    <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="https://i.imgur.com/QpjAiHq.jpg"></div>
                    <div class="col-md-6 mt-1">
                        <h5>Quant olap shirts</h5>
                        <div class="d-flex flex-row">
                            <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>310</span>
                        </div>
                        <div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span class="dot"></span><span>Light weight</span><span class="dot"></span><span>Best finish<br></span></div>
                        <div class="mt-1 mb-1 spec-1"><span>Unique design</span><span class="dot"></span><span>For men</span><span class="dot"></span><span>Casual<br></span></div>
                        <p class="text-justify text-truncate para mb-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.<br><br></p>
                    </div>
                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                        <div class="d-flex flex-row align-items-center">
                            <h4 class="mr-1">$13.99</h4><span class="strike-text">$20.99</span>
                        </div>
                        <h6 class="text-success">Free shipping</h6>
                        <div class="d-flex flex-column mt-4">
                            <a class="btn btn-primary btn-sm mt-5" href="#">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection