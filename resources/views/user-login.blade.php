@extends('layout')
@section('title','UserLogin')

@section('main')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div style="width:30vw;" class="shadow p-3 mb-5 bg-body-tertiary rounded">
        <p class="fs-3 text-center">User Login</p>

@error('user') <p class="fs-6 text-danger">{{$message}}</p> @enderror

        <form action="/userlogin" method="post">
            @csrf

      
            
                        <div class="mb-3">
                <label class="form-label">Enter email address</label>
                <input type="email" class="form-control border border-primary rounded-pill bg-secondary-subtle" name="email" placeholder="Enter Email Address">
              @error('email') <p class="fs-6 text-danger">{{$message}}</p> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Enter password</label>
                <input type="password" class="form-control border border-primary rounded-pill bg-secondary-subtle" name="password" placeholder="Enter password">
                @error('password') <p class="fs-6 text-danger">{{$message}}</p> @enderror
            </div>
            

            <button type="submit" class="btn btn-primary w-100 rounded-pill">Login</button>
            <div class="d-flex my-2">
                <div class="form-check w-50">
    <input type="checkbox" class="form-check-input" id="Checkbox">
    <label class="form-check-label text-black-50" for="Checkbox">Remember me</label>
  </div>
  <div class="w-50">
   <a href="/forgot"> <span class="text-primary offset-3">Forget password?</span></a>
  </div>
            </div>
        </form>
    </div>
</div>
@endsection