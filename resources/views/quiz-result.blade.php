@extends('layout')
@section('title','Quiz Result')

<x-usernav></x-usernav>

@section('main')

<div class="d-flex flex-column min-vh-100">

    <!-- Main content: centered -->
    <div class="d-flex flex-column flex-grow-1 justify-content-center align-items-center p-3">

        <div class="card shadow p-4" style="max-width: 700px; width: 100%;">
            <div class="text-center mb-4">
                <h3 class="fw-bold">Final Result</h3>

                @php
                    $total = count($finalres);
                    $percentage = $total > 0 ? ($count_correct / $total) * 100 : 0;
                @endphp

                <p class="text-success mb-2">
                    Correct Answers: <span class="text-dark">{{ $count_correct }} out of {{ $total }}</span>
                </p>

                <!-- Progress Bar -->
                <div class="progress w-75 mx-auto mb-3" style="height: 25px;">
                    <div class="progress-bar" role="progressbar" 
                         style="width: {{ $percentage }}%;" 
                         aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
                        {{ round($percentage) }}%
                    </div>
                </div>

                <!-- Feedback -->
                 
                @if($total > 0 && $count_correct / $total >= 0.5)
                    <p class="fs-5 fw-semibold text-success">Well done! You did better 😊✨</p>
                     <p class="fs-6 text-success"><a href="/complete_quiz" target="_blank">See Certificate✅</a></p>
                @elseif($count_correct / $total >= 0.2)
                    <p class="fs-5 fw-semibold text-success">Good job🤩</p>
                    @else
                      <p class="fs-5 fw-semibold text-success">Try Again Later!</p>
                @endif

            </div>

            <!-- Quiz Results Table -->
            <div class="row fw-bold text-center border-bottom p-2 text-secondary">
                <div class="col">Sl No.</div>
                <div class="col">Question</div>
                <div class="col">Result</div>
            </div>

            @foreach($finalres as $key => $item)
                <div class="row text-center mt-2 border-bottom py-2">
                    <div class="col">{{ $key + 1 }}</div>
                    <div class="col">{{ $item->question }}</div>
                    <div class="col">
                        @if($item->is_correct == 1)
                            <span class="fw-bold text-success">Correct</span>
                        @else
                            <span class="fw-bold text-danger">Incorrect</span>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <!-- Footer at bottom -->
    <x-userfooter></x-userfooter>
</div>

@endsection
