@extends('layout')
@section('title','mcq-list')

<x-navbar name={{$name}}></x-navbar>


@section('main')

<div class="container text-center w-50">
    <p class="fs-5 text-info text-center mt-1">MCQs <span><a href="/category" class="btn btn-primary text-light mb-1 btn-sm">Back</a></span></p>
  <div class="row fw-bold mb-1">
    <div class="col-6">
    MCQ
    </div>
    <div class="col-6">
      Created
    </div>
   
  </div>
  <div class="row">
    @if($allquest->count() > 0)
  @foreach($allquest as $qst)
  <div class="col-6">
    {{$qst->question}}
    </div>
    <div class="col-6">
    {{$qst->created_at}}
    </div>
   
@endforeach
@else

    <div class="col-12 text-center text-muted py-3">
        No MCQ found
    </div>

@endif
</div>
</div>
@endsection