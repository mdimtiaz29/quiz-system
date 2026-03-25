@extends('layout')
@section('title','user-detials')

<x-usernav></x-usernav>
@section('main')
<div class="container mt-5">


<p class="fs-2 fw-bold text-center">Hi {{ucfirst($username->name)}}</p>
 <div class="w-50 mx-auto text-center">
    
    <span><a href="/edit_profile/{{$username->id}}" class="text-center">Edit Profile</a></span>
  </div>
<p class="mb-5 fs-4 fw-bold text-center text-primary">Watch your status</p>

</div>
<div class="w-50 mx-auto">
    <div class="row fw-bold mb-1">
    <div class="col-4">
    Sl no.
    </div>
    <div class="col-4">
      Quiz Name
    </div>
   <div class="col-4">
      Status
    </div>
  </div>
  
  @if($quizrecords->count()>0)  
  @foreach($quizrecords as $key=>$details)
  <div class="row custom-row">
  <div class="col-4 p-2">
    {{$key+1}}
    </div>
    <div class="col-4 p-2">
    {{$details->name}}
    </div>
   <div class="col-4 p-2">
    @if($details->status==2)
   <span class="text-success fw-bold">Completed <a class="fw-semibold fs-6 text-success offset-1" href="/complete_quiz" target="_blank">See Certificate✅</a></span>
    @else
    <span class="text-danger fw-bold">Incompleted</span>
    @endif
    </div>
    
</div>

@endforeach
@else

    <div class="col-12 text-center text-muted py-3">
        No status found!
        <span>TO CMPLETE THE QUIZ CHOOSE CATEGORY AND FIND YOUR QUIZ AS MUCH AS YOU WANT, <a href="/" class="btn btn-primary btn-sm">Click here</a></span>
    </div>

@endif
</div>

@endsection