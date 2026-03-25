@extends('layout')
@section('title','MCQs')

<x-navbar name={{$name}}></x-navbar>

@section('main')
<div class="container my-5">
<div class="row">

            <div class="col-4 fw-bold text-center mt-1">
                Questions <a href="/add-quiz" class="btn btn-primary text-light mb-1 btn-sm">Back</a>
            </div>
           
</div>
<div class="row">
@foreach($mcqs as $r)
            <div class="col-12 fw-bold text-left border border-black">
                {{$r->question}}
            </div>
            @endforeach    
</div>
</div>
@endsection
