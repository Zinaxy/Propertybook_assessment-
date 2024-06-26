@extends('layouts.app')
@section('content')
<div class="row justify-content-center  mt-5">
    <div class="col-lg-4">
        <div class="card card-secondary">

            <div class="card-body">
                <h1 class="">Login</h1>
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    @if (Session('status'))
                    <div class="alert alert-danger">{{Session('status')}}</div>
                    @endif
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

                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    <a href="{{route('register')}}" class="m-4">Create Admin Account</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection