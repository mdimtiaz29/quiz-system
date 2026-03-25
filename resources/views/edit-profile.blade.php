@extends('layout')
@section('title','profile')

<x-usernav></x-usernav>
@section('main')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="w-40">
        <form action="/edit" method="POST" enctype="multipart/form-data">

            @csrf
             @method('PUT')
            <input type="hidden" value="{{$result->id}}" name="id">
            <div class="mb-3">
                <label for="username" class="form-label">Enter User Name</label>
                <input type="text" class="form-control" id="username" name="name" value="{{ $result->name }}">
               @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror      
                 </div>
            <div class="mb-3">
                <label for="file" class="form-label">Upload Profile photo</label>
                <input type="file" class="form-control" id="file" name="file">
                 @error('file') <p>{{message}}</p> @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>
</div>
@endsection
