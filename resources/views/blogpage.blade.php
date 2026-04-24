@extends('layout')

@section('title','Quiz System Blog')

@section('main')

<div class="container my-5">


    <div class="p-5 mb-4 bg-dark text-white rounded-3 shadow">
        <div class="container-fluid py-4">
            <h1 class="display-5 fw-bold">Quiz System Web Application</h1>
            <p class="col-md-8 fs-5">
                A modern online quiz platform built using Laravel. This system allows
                administrators to create quizzes and users to participate and view results instantly.
            </p>
            <a href="#features" class="btn btn-primary btn-lg">Explore Features</a>
        </div>
    </div>

    
    <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="mb-3">About the Project</h2>
            <p class="text-muted">
                This quiz system web application was developed to simplify online assessments.
                The platform allows administrators to create quizzes and manage questions,
                while users can participate in quizzes and see their results immediately.
            </p>

            <p class="text-muted">
                The application is built using Laravel for backend development,
                Bootstrap for responsive design, and MySQL for database management.
                Laravel’s MVC architecture helps keep the project organized and secure.
            </p>
        </div>
    </div>

    
    <h2 class="mb-4 text-center" id="features">System Features</h2>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">User Authentication</h5>
                    <p class="card-text">
                        Users can register and log in securely before participating in quizzes.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Quiz Management</h5>
                    <p class="card-text">
                        Administrators can create, update, and delete quizzes easily through the dashboard.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Automatic Results</h5>
                    <p class="card-text">
                        After completing the quiz, the system automatically calculates and displays scores.
                    </p>
                </div>
            </div>
        </div>

    </div>

    
    <div class="row mt-5">
        <div class="col-md-12">
            <h2 class="mb-3">Technologies Used</h2>

            <ul class="list-group">
                <li class="list-group-item">Laravel (Backend Framework)</li>
                <li class="list-group-item">Bootstrap 5 (UI Design)</li>
                <li class="list-group-item">MySQL Database</li>
                <li class="list-group-item">HTML, CSS, JavaScript</li>
            </ul>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-md-12">
            <h2 class="mb-3">Future Improvements</h2>
            <p class="text-muted">
                In the future, this system may include a timer-based quiz system,
                leaderboards, analytics dashboards, and support for mobile applications.
            </p>
        </div>
    </div>

</div>

@endsection