@extends('layout')
@section('title','mcq-page')
<x-usernav></x-usernav>
@section('main')
<div class="d-flex flex-column justify-content-center align-items-center min-vh-100">

    <!-- Quiz Name -->
    <div class="mb-3 text-center">
    <p class="fs-3">{{str_replace('-', ' ', strtolower($qname))}}</p>
    <p class="fs-5">
        Total MCQ: {{ session('currentquiz.totalmcq') ?? 0 }}
    </p>
    <p class="fs-5 text-muted">
    Question {{ session('currentquiz.currentmcq') }} 
    of 
    {{ session('currentquiz.totalmcq') }}
</p>

</div>


    <!-- Form Box -->
    <div style="width:30vw;" class="shadow p-3 mb-5 bg-body-tertiary rounded">
 <p class="fs-5 mb-3">
      {{$mcqdata->question}}
    </p>
        <form action="/mcq-result/{{$mcqdata->id}}" method="post">
            @csrf
<input type="hidden" name="mcq_id" value="{{ $mcqdata->id }}">

            <!-- Option 1 -->
            <label class="mcq-option mb-3 w-100 border border-primary rounded-pill p-1">
                <input type="radio" name="option" value="a">
                <span class="option-text">{{$mcqdata->a}}</span>
            </label>

            <!-- Option 2 -->
            <label class="mcq-option mb-3 w-100 border border-primary rounded-pill p-1">
                <input type="radio" name="option" value="b">
                <span class="option-text">{{$mcqdata->b}}</span>
            </label>

            <!-- Option 3 -->
            <label class="mcq-option mb-3 w-100 border border-primary rounded-pill p-1">
                <input type="radio" name="option" value="c">
                <span class="option-text">{{$mcqdata->c}}</span>
            </label>

            <!-- Option 4 -->
            <label class="mcq-option mb-4 w-100 border border-primary rounded-pill p-1">
                <input type="radio" name="option" value="d">
                <span class="option-text">{{$mcqdata->d}}</span>
</label>
    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                Submit Answer
            </button>
    <button type="submit" name="quit" value="quit"
class="btn btn-warning w-100 py-2 mt-3 fw-semibold">
Quit
</button>

        </form>
    </div>

</div>
<x-userfooter></x-userfooter>
@endsection