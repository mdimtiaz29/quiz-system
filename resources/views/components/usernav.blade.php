<nav class="navbar navbar-expand-lg custom-navbar bg-primary">
  <div class="container">
    <a class="navbar-brand text-white" href="/">Quiz System</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link text-light" href="/">Home</a></li>
 <li class="nav-item"><a class="nav-link text-light" href="/category-top-list">Category</a></li>
        @if(session('user'))

        <li class="nav-item"><a class="nav-link text-light fw-bold" href="/user-details/{{session('user.id')}}">Welcome {{ucfirst(session('user.name'))}}</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="/userlogout">Logout</a></li>
        @else
                <li class="nav-item"><a class="nav-link text-light" href="/userlogin">Login</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="/usersignup">Sign Up</a></li>
        @endif
        <li class="nav-item"><a class="nav-link text-light" href="#">Blog</a></li>
      </ul>
    </div>
  </div>
</nav>
