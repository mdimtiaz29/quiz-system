
<nav class="navbar navbar-expand-lg custom-navbar">
  <div class="container">
    <a class="navbar-brand custom-color" href="#">Quiz System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link text-light fs-6 hvr" href="/dashboard">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link text-light fs-6 hvr" href="/category">Category</a></li>
        <li class="nav-item"><a class="nav-link text-light fs-6 hvr" href="/add-quiz">Quiz</a></li>
        <li class="nav-item">
          <a class="nav-link text-light fs-6 fw-bold hvr" href="#">Welcome <span>{{ $name ?? 'Guest' }}</span></a>
        </li>
        <li class="nav-item"><a class="nav-link text-light fs-6 hvr" href="/logout">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>