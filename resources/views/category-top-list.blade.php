@extends('layout')
@section('title','Top-category')

<x-usernav></x-usernav>
@section('main')

<div class="d-flex justify-content-center align-items-center min-vh-100 flex-column">
    
    <div class="container text-center w-75 shadow-sm p-4 rounded bg-white">
        <p class="text-success fs-5 fw-bold mb-1">Top Category</p>
        <p class="text-muted fs-6 mb-4">Click category what you like</p>

        <div class="row fw-semibold bg-light border rounded py-2 mb-2">
            <div class="col">Sl no.</div>
            <div class="col">Category</div>
            <div class="col">Total Quizzes</div>
            <div class="col">Action</div>
        </div>

        @foreach($categories as $key=>$r)
        <div class="row border-bottom py-2 align-items-center">
            <div class="col-3">{{$key+1}}</div>
            <div class="col-3 fw-semibold">{{$r->name}}</div>
            <div class="col-3 text-success">{{$r->quizzes_count}}</div>
            <div class="col-3">
                <a href="/user-quiz-list/{{$r->id}}/{{$r->name}}" 
                   class="btn btn-sm btn-outline-primary px-3">
                   View
                </a>
            </div>
        </div>
        @endforeach

        <!-- Pagination -->
      <!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    {{$categories->links()}}
</div>




    </div>

</div>

<x-userfooter></x-userfooter>
@endsection
