@extends('layout')
@section('title','quiz-list')

<x-navbar name={{$name}}></x-navbar>


@section('main')

<div class="container text-center w-50">
   
<p class="fs-5 text-info text-center mt-1">Quizzes for <span style="font-style: italic;">{{$categoryname}}</span>  <span><a href="/category" class="btn btn-primary text-light mb-1 btn-sm">Back</a></span></p>

<div class="row fw-bold mb-1">
    <div class="col-4">
    Name
    </div>
    <div class="col-4">
      Created
    </div>
    <div class="col-4">
    Action
    </div>
  </div>
  <div class="row">
    @if($allq->count() > 0)
  @foreach($allq as $quiz)
  <div class="col-4">
    {{$quiz->name}}
    </div>
    <div class="col-4">
    {{$quiz->created_at}}
    </div>
    <div class="col-4">
   
            <a href="/mcq-list/{{$quiz->id}}">
               <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>          </a>
      
    </div>
@endforeach
@else
    <div class="col-12 text-center text-muted py-3">
        No Quiz Found
    </div>
@endif
</div>
</div>
@endsection