@extends('layout')
@section('title','UserSignup')

@section('main')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div style="width:30vw;" class="shadow p-3 mb-5 bg-body-tertiary rounded">
        <p class="fs-3 text-center">User Signup</p>

@error('user') <p class="fs-6 text-danger">{{$message}}</p> @enderror

        <form action="/usersignup" method="post">
            @csrf

      
            <div class="mb-3">
                <label class="form-label">Enter user name</label>
                <input type="text" class="form-control border border-primary rounded-pill bg-secondary-subtle" name="name" placeholder="Enter User Name">
              @error('name') <p class="fs-6 text-danger">{{$message}}</p> @enderror
            </div>
                        <div class="mb-3">
                <label class="form-label">Enter email address</label>
                <input type="email" class="form-control border border-primary rounded-pill bg-secondary-subtle" name="email" placeholder="Enter Email Address">
              @error('email') <p class="fs-6 text-danger">{{$message}}</p> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Enter password</label>
                <input type="password" class="form-control border border-primary rounded-pill bg-secondary-subtle" name="password" placeholder="Enter Password">
                @error('password') <p class="fs-6 text-danger">{{$message}}</p> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Enter confirm password</label>
                <input type="password" class="form-control border border-primary rounded-pill bg-secondary-subtle" name="password_confirmation" placeholder="Enter Confirm Password">
      
            </div>

            <button type="submit" class="btn btn-primary w-100 rounded-pill">Signup</button>
            <p>If you have already an account, <a href="/userlogin">Login</a></p>
        </form>
    </div>
</div>
@endsection