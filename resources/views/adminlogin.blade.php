@extends('layout')
@section('title','adminlogin')

@section('main')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div style="width:30vw;" class="shadow p-3 mb-5 bg-body-tertiary rounded">
        <p class="fs-3 text-center">Admin Login</p>

@error('user') <p class="fs-6 text-danger">{{$message}}</p> @enderror

        <form action="login" method="post">
            @csrf

      
            <div class="mb-3">
                <label class="form-label">Enter name</label>
                <input type="text" class="form-control border border-primary" name="name" placeholder="Enter Username">
              @error('name') <p class="fs-6 text-danger">{{$message}}</p> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Enter password</label>
                <input type="password" class="form-control border border-primary" name="password" placeholder="Enter Password">
                @error('password') <p class="fs-6 text-danger">{{$message}}</p> @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>
@endsection