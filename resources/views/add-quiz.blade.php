@extends('layout')
@section('title','quiz-form')

<x-navbar name={{$name}}></x-navbar>

@section('main')
@if(session('msg1'))
<div class="container mt-3">
    <p class="fs-5 bg-success text-light p-2 rounded">
       " {{ session('msg1') }} "
    </p>
</div>
@endif
<div class="d-flex flex-column justify-content-start align-items-center min-vh-100 mt-4">

    <!-- FORM -->
    
    <div class="col-md-5 mb-4">
        <div class="shadow p-4 bg-body-tertiary rounded">
             @if(!session('quizdetails'))
            <p class="fs-3 text-center">Add quiz</p>

            <form action="{{ url('add-quiz') }}" method="get">
                

                <div class="mb-3 text-start">
                    
                    <input type="text"
                           class="form-control border border-info rounded-pill p-2"
                           name="quiz_name"
                           required
                           placeholder="Enter quiz">

                </div>
                <div>
                    <select name="category_id" class="form-control w-50 border border-info mb-3" required>
                        <option class="fw-bold">Select any category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Add
                </button>
            </form>
            @else
            <span class="text-success fw-bold">Quiz: {{session('quizdetails.name')}}</span>
            <p> Total: {{$totalmcq}}
                @if($totalmcq>0)
                <span class="fs-6"><a href="/show-mcq/{{session('quizdetails.id')}}" class="text-warning">Show MCQs</a></span>
               @endif 
            </p>
            <div>
                <form action="/add-mcq" method="post">
                    @csrf
                      <div class="form-text"><span class="fs-6 text-danger">Must contain all options</span></div>
                    <div class="mb-3">
  <label class="form-label">Question:</label>
  <textarea class="form-control border border-info" name="question" rows="3" placeholder="Enter question here"></textarea>
@error('question')<p class="fs-6 text-danger">{{$message}}</p>@enderror
</div>

                                    <div class="mb-3 text-start">
                    
                    <input type="text"
                           class="form-control border border-info rounded-pill p-2"
                           name="a"
                           placeholder="Enter option-A">
@error('a')<p class="fs-6 text-danger">{{$message}}</p>@enderror
                </div>
                              <div class="mb-3 text-start">
                    
                    <input type="text"
                           class="form-control border border-info rounded-pill p-2"
                           name="b"
                           placeholder="Enter option-B">
@error('b')<p class="fs-6 text-danger">{{$message}}</p>@enderror
                </div>
                              <div class="mb-3 text-start">
                    
                    <input type="text"
                           class="form-control border border-info rounded-pill p-2"
                           name="c"
                           placeholder="Enter option-C">
@error('c')<p class="fs-6 text-danger">{{$message}}</p>@enderror
                </div>
                              <div class="mb-3 text-start">
                    
                    <input type="text"
                           class="form-control border border-info rounded-pill p-2"
                           name="d"
                           placeholder="Enter option-D">
@error('d')<p class="fs-6 text-danger">{{$message}}</p>@enderror
                </div>
                <div>
                    <select name="correct_ans" class="form-control w-50 border border-info mb-3">
                        <option>Select correct answer</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>D</option>
</select> 
                </div>

                <button type="submit" value="add_more" name="add_more" class="btn btn-primary w-100">
                    Add more
                </button>
                
                <button type="submit" value="sub" name="sub" class="btn btn-success w-100 mt-3">
                  Add and  Submit
                </button>
                                <button type="submit" value="leave" name="leave" class="btn btn-danger w-100 mt-3">
                    Leave
                </button>
                </form>
            </div>
            @endif
        </div>
    </div>

    

</div>

@endsection