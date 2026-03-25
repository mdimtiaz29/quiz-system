@extends('layout')
@section('title','reset-password')

@section('main')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div style="width:30vw;" class="shadow p-3 mb-5 bg-body-tertiary rounded">
        <p class="fs-3 text-center">User Reset Password</p>


        <form action="/update_password" method="post">
            @csrf

      
               <input type="hidden" value="{{$email}}" name="email">  

            <div class="mb-3">
                <label class="form-label">Enter password</label>
                <input type="password" class="form-control border border-primary rounded-pill bg-secondary-subtle" name="password" placeholder="Enter Password">
                @error('password') <p class="fs-6 text-danger">{{$message}}</p> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Enter confirm password</label>
                <input type="password" class="form-control border border-primary rounded-pill bg-secondary-subtle" name="password_confirmation" placeholder="Enter Confirm Password">
      
            </div>

            <button type="submit" class="btn btn-primary w-100 rounded-pill">Update password</button>
            
        </form>
    </div>
</div>
@endsection