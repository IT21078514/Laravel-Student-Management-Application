<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('images/logo.png') }}" width="60" height="60" class="d-inline-block align-center" alt="">
        <b>Management</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link active" href="{{ route('student') }}" selected> Student Data </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link active" href="#">Features</a>
        </li>
      
      </ul>
    </div>
  </nav>