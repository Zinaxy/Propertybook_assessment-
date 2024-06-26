@extends('layouts.app')
@section('content')
<div class="row justify-content-center  mt-5">
    <div class="col-lg-4">
        <div class="card card-secondary">

            <div class="card-body">
                <h1 class="">Register</h1>
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control"
                            id="exampleInputText1" aria-describedby="textHelp">
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        @error('password')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            id="exampleInputPassword2">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    <a href="{{route('login')}}" class="m-4">Already Registered</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection