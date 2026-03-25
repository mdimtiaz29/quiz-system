@extends('layout')
@section('title','home')

<x-usernav></x-usernav>

@section('main')
<div class="container my-3">
<div class="alert alert-info alert-dismissible fade show w-50 mx-auto" role="alert">
  <strong>Hey Learner!</strong> Test your knowledge, challenge your mind, and unlock new levels of learning!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
@if(Session::has('addmsg'))
    <div class="w-50 mx-auto alert fw-bold text-center">
        {{ Session::get('addmsg') }}
    </div>
@endif
@if(Session::has('verifymsg'))
    <div class="w-50 mx-auto alert fw-bold text-center">
        {{ Session::get('verifymsg') }}
    </div>
@endif
@if(session('invalidMsg'))
    <div class="alert w-50 mx-auto fw-bold text-center">
        {{ session('invalidMsg') }}
    </div>
@endif
@if(session('forgetmsg'))
    <div class="alert w-50 mx-auto fw-bold text-center">
        {{ session('forgetmsg') }}
    </div>
@endif
<div class="container my-5">
    <div class="w-50 mx-auto border bg-primary p-5">
    <p class="fs-3 text-center text-light fw-bold">Test Yourself</p>
    <div class="d-flex justify-content-center">
        
        <form class="w-100" action="/searchQuiz" method="get">
            <div class="position-relative">
                <span class="position-absolute top-50 start-0 translate-middle-y ms-3 text-success">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="currentColor">
                        <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/>
                    </svg>
                </span>
                         
                <input
                    class="form-control ps-5 border border-success rounded-pill"
                    type="search"
                    name="search"
                    placeholder="Search Quiz"
                    aria-label="Search"
                >
            </div>
        </form>
    </div>
</div>
</div>

<div class="container text-center w-50">
    <p class="text-success fs-5 fw-bold">Category List</p>
  <div class="row fw-bold bg-dark-subtle">
    <div class="col">
      Sl no.
    </div>
    <div class="col">
      Category
    </div>
    <div class="col">
      Total Quizzes
    </div>
    <div class="col">
      Action
    </div>
  </div>

  @foreach($allcategory as $key=>$r)
    <div class="row custom-row">
  <div class="col-3 pt-1">
      {{$key+1}}
    </div>
    <div class="col-3 pt-1">
      {{$r->name}}
    </div>
    <div class="col-3 pt-1">
      {{$r->quizzes_count}}
    </div>
    <div class="col-3 my-1">
       
              <a href="/user-quiz-list/{{$r->id}}/{{str_replace(' ', '-', strtolower($r->name))}}" class="btn btn-sm btn-primary">View</a>
    </div>
    </div>
  @endforeach
  
</div>
<x-userfooter></x-userfooter>
@endsection

