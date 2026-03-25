@extends('layout')
@section('title','user-quiz-list')
<x-usernav></x-usernav>

@section('main')
<div class="container text-center w-50 my-5">
    <p class="text-success fs-5">Category Name: {{$categoryname}}</p>
  <div class="row fw-bold bg-dark-subtle">
    <div class="col">
      Sl no.
    </div>
    <div class="col">
      Quizzes
    </div>
    
    <div class="col">
      Action
    </div>
  </div>
  
    @if($allquiz->count() > 0)
  @foreach($allquiz as $key=>$r)
  <div class="row custom-row">
  <div class="col-4 pt-2">
      {{$key+1}}
    </div>
    <div class="col-4 pt-2">
      {{$r->name}}
    </div>
    
    <div class="col-4 my-1">
       
              <a href="/start-quiz/{{$r->id}}/{{ str_replace(' ', '-', strtolower($r->name)) }}" 
   class="btn btn-sm btn-primary">
   view
</a>

    </div>
    </div>
  @endforeach
  @else
  <p class="mt-3">No Quiz Found</p>
  @endif
  
</div>

@endsection

