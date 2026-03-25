@extends('layout')
@section('title','search-result')

<x-usernav></x-usernav>
@section('main')
<div class="container my-3">
<div class="alert alert-info alert-dismissible fade show w-50 mx-auto" role="alert">
  Challenge yourself and see how you rank among other quiz lovers
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

</div>
<div class="container my-5 text-center w-50">
    <p class="text-success fs-5 fw-bold">Search Result</p>
  <div class="row fw-bold bg-dark-subtle">
    <div class="col">
      Sl no.
    </div>
    <div class="col">
      Category
    </div>
    <div class="col">
      Total Mcqs
    </div>
    <div class="col">
      Action
    </div>
  </div>
@if($totalcal->count()>0)
  @foreach($totalcal as $key=>$r)
    <div class="row custom-row">
  <div class="col-3 pt-1">
      {{$key+1}}
    </div>
    <div class="col-3 pt-1">
      {{$r->name}}
    </div>
    <div class="col-3 pt-1">
      {{$r->mcqs_count}}
    </div>
    <div class="col-3 my-1">
       
                 <a href="/start-quiz/{{$r->id}}/{{str_replace(' ', '-', strtolower($r->name))}}" class="btn btn-sm btn-primary">view</a>
    </div>
    </div>
  @endforeach
  @else
  <div class="col-12 my-5">
    <p class="text-danger text-center">No Result Found</p>
  </div>
  @endif
</div>
@endsection