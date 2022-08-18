@extends('layouts.app')
@section('css')
    .form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
    }

    .profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
    }

    .profile-button:hover {
    background: #682773
    }

    .profile-button:focus {
    background: #682773;
    box-shadow: none
    }

    .profile-button:active {
    background: #682773;
    box-shadow: none
    }

    .back:hover {
    color: #682773;
    cursor: pointer
    }

    .labels {
    font-size: 11px
    }

    .add-experience:hover {
    background: #BA68C8;
    color: rgba(171,240,248,0.88);
    cursor: pointer;
    border: solid 1px #BA68C8
    }

@endsection
@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{asset('images/DSC_0004.JPG')}}"><span class="font-weight-bold">{{$user->name}}</span><span class="text-black-50">{{$user->email}}</span><span> </span></div>
            </div>
            <div class="col-md-8 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <form id="updateProfile" method="POST" enctype="multipart/form-data" action="{{ route('profile.update',parameters: $user->id) }}">
                        @csrf
                        @method('PUT')
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Name</label><input name="name" type="text" class="form-control" placeholder="first name" value="{{$user->name}}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email</label><input disabled type="text" class="form-control" placeholder="enter address line 1" value="{{$user->email}}"></div>
                        <div class="col-md-12"><label class="labels">Image</label><input type="file" name="image" accept="image/*" class="form-control" value=""></div>
                        <div class="col-md-12"><label class="labels">Date Of Birth</label><input name="DOB" type="date" class="form-control" value="{{$user->DOB}}"></div>
                        <div class="col-md-12"><label class="labels">Password</label><input type="password" name="password" class="form-control" placeholder="Password" value=""></div>
{{--                        <div class="col-md-12"><label class="labels">Confirm Password</label><input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" value=""></div>--}}
                    </div>
                    </form>
                    <form id="deleteProfile" action="{{ route('profile.destroy',parameters: $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                    <div class="text-center mt-3 d-flex justify-content-around">
                        <input class="btn btn-primary" type="submit" value="Save Profile" form="updateProfile">
                        <input class="btn btn-danger" type="submit" form="deleteProfile" value="Delete Profile">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
