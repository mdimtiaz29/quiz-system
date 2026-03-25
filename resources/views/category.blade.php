@extends('layout')
@section('title','category')

<x-navbar name={{$name}}></x-navbar>

@section('main')

@if(session('msg'))
<div class="container mt-3">
    <p class="fs-5 bg-success text-light p-2 rounded">
        {{ session('msg') }}
    </p>
</div>
@endif

<!-- Full page container with vertical centering -->
<div class="d-flex flex-column justify-content-center align-items-center min-vh-100">

    <!-- FORM -->
    <div class="col-md-5 mb-4">
        <div class="shadow p-4 bg-body-tertiary rounded">
            <p class="fs-3 text-center">Add Category</p>

            <form action="{{ url('addcategory') }}" method="post">
                @csrf

                <div class="mb-3 text-start">
                    <label class="form-label">Category name</label>
                    <input type="text"
                           class="form-control border border-info rounded-pill p-2"
                           name="category"
                           
                           placeholder="Enter category">
                           @error('category') <p class="fs-6 text-danger">{{$message}}</p> @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Add
                </button>
            </form>
        </div>
    </div>

    <!-- ROW UNDER FORM -->
    <div class="col-md-5">
        <div class="row p-1 bg-dark-subtle">
            
            <div class="col-12 text-primary">
              <p class="text-left fs-5">Category list</p>
            </div>
            <div class="col-3 fw-bold text-center">
                Sl no.
            </div>
            <div class="col-3 fw-bold text-center">
                Category
            </div>
            <div class="col-3 fw-bold text-center">
                Creator
            </div>
            <div class="col-3 fw-bold text-center">
                Action
            </div>
        </div>
        <div class="row bg-dark-subtle">
        @foreach($allcat as $key=>$r)
        <div class="col-3 p-1 text-center">
                {{$key+1}}
            </div>
 <div class="col-3 p-1 text-center">
                {{$r->name}}
            </div>
            <div class="col-3 p-1 text-center">
                {{$r->creator}}
            </div>
            <div class="col-3 text-center p-1">
                <a href="/category/delete/{{$r->id}}" class="mx-1">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
          </a>
            <a href="/quiz-list/{{$r->id}}/{{$r->name}}">
               <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>          </a>
            </div>
        @endforeach
        </div>
    </div>

</div>
@endsection