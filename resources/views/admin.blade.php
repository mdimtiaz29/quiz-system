
 @extends('layout')
@section('title','admin')

<x-navbar name={{$getname}}></x-navbar>

@section('main')

@if(session('msg2'))
<div class="container">
<p>{{session('msg2')}}</p>

</div>

@endif
<div class="container text-center w-50 my-5">
    <p class="text-success fs-5 fw-bold">All Users</p>
  <div class="row fw-bold bg-dark-subtle">
    <div class="col">
      Sl no.
    </div>
    <div class="col">
      Name
    </div>
    <div class="col">
      Email
    </div>
    <div class="col">
      Status
    </div>
  </div>

  @foreach($user as $key=>$r)
    <div class="row custom-row">
  <div class="col-3 pt-1">
      {{$key+1}}
    </div>
    <div class="col-3 pt-1">
      {{$r->name}}
    </div>
    <div class="col-3 pt-1">
      {{$r->email}}
    </div>
    <div class="col-3 my-1" style="">
      @if($r->active==1)
       <a href="/user-activity/{{$r->id}}" class="btn btn-sm btn-primary">
  Activate
       </a>
       @else
        <a href="/user-activity/{{$r->id}}" class="btn btn-sm btn-danger">
  Block
       </a>

      @endif
    </div>
    </div>
  @endforeach
  <div class="my-3">
{{$user->links()}}  
</div>
</div>

@endsection