@extends('layout')
@section('title','start-quiz')

<x-usernav></x-usernav>
@section('main')
<div class="w-50 mx-auto">
<div>
    <p class="fs-2 fw-bold mt-5 text-center">{{$totalmcqs}} Questions of {{str_replace('-', ' ', strtolower($getname))}}</p>
    <p class="text-center text-success">This quiz contains {{$totalmcqs}} MCQs</p>
</div>
 @if(!session('user'))
<div class="d-flex justify-content-center mt-5">
    <a href="/sign_log" class="btn btn-sm btn-primary">Login/Signup</a>

</div>
@else
<div class="d-flex justify-content-center mt-5">
    <a href="/mcq/{{session('firstmcq.id').'/'.$getname}}" class="btn btn-sm btn-primary">Start Quiz</a>

</div>
@endif
</div>


@endsection
