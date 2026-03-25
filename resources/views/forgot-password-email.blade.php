@extends('layout')
@section('title','UserLogin')

@section('main')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div style="width:30vw;" class="shadow p-3 mb-5 bg-body-tertiary rounded">
        <p class="fs-3 text-center">Forget Password</p>

@error('user') <p class="fs-6 text-danger">{{$message}}</p> @enderror

        <form action="/forget" method="post">
            @csrf

      
            
                        <div class="mb-3">
                <label class="form-label">Enter email address</label>
                <input type="email" class="form-control border border-primary rounded-pill" name="email" placeholder="Enter Email Address">
              @error('email') <p class="fs-6 text-danger">{{$message}}</p> @enderror
            </div>

            
            

            <button type="submit" class="btn btn-primary w-100 rounded-pill">Send Email</button>
            
        </form>
    </div>
</div>
@endsection