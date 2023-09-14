

<!doctype html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="/css/styles.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  {{-- nav bar --}}
  <nav class="navbar navbar-expand-lg shadow-sm" style="background: rgb(225, 0, 0)" >
    <div class="container-fluid">
        <ul class="nav " >
            <img src="{{ asset('img/logo.jpg') }}" style="width: 70px; height:70px" class="ms-2" alt="">
            <h2 class="m-1 p-2 fw-bold mt-1 text-white">Manchester United</h2>
          </ul>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      {{-- <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="#"><i class="fa-solid fa-house me-1"></i>Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Link</a>
          </li>
        </ul>

      </div> --}}
      <div class="nav-item dropdown text-end me-5 text-white">
        <a class="nav-link dropdown-toggle me-5 fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <i class="fa-solid fa-user me-2"></i>{{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('admin#account') }}">Account Info</a></li>
          <li><a class="dropdown-item" href="{{ route('admin#changePasswordPage') }}">Change Password</a></li>
          <li><hr class="dropdown-divider">
            <form action="{{ route('logout') }}" method="POST" class="text-center">
                @csrf
                <button class="btn btn-danger px-3">
                    Logout<i class="fa-solid fa-right-from-bracket ms-2"></i>
                </button>
            </form>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <div class="row">
    <div class="d-flex">
       <div class="col-md-2" style="height: 87vh; background-color:rgb(255, 71, 71)">
        <a href="{{ route('admin#postList') }}" class="text-light text-decoration-none">
            <h5 class="my-4 mx-5"><i class="fa-solid fa-list me-2"></i>Post List</h5>
        </a>
        <a href="{{ route('admin#store') }}" class="text-light text-decoration-none">
            <h5 class="my-4 mx-5"><i class="fa-solid fa-store me-2"></i>Store</h5>
        </a>
        <a href="{{ route('admin#ticket') }}" class="text-light text-decoration-none">
            <h5 class="my-4 mx-5"><i class="fa-solid fa-ticket me-2"></i>Ticket</h5>
        </a>
        <a href="{{ route('admin#fixture') }}" class="text-light text-decoration-none">
            <h5 class="my-4 mx-5"><i class="fa-solid fa-calendar-days me-2"></i>Fixture</h5>
        </a>
        <a href="{{ route('admin#result') }}" class="text-light text-decoration-none">
            <h5 class="my-4 mx-5"><i class="fa-solid fa-futbol me-2"></i>Result</h5>
        </a>
        <a href="{{ route('admin#player') }}" class="text-light text-decoration-none">
            <h5 class="my-4 mx-5"><i class="fa-solid fa-users me-2"></i>Player</h5>
        </a>
           <a href="{{ route('admin#home') }}" class="text-light text-decoration-none">
               <h5 class="my-4 mx-5"><i class="fa-solid fa-list me-2"></i>Category</h5>
           </a>
           <a href="{{ route('admin#teamList') }}" class="text-light text-decoration-none">
            <h5 class="my-4 mx-5"><i class="fa-solid fa-list me-2"></i>Team List</h5>
        </a>
           <a href="{{ route('admin#userList') }}" class="text-light text-decoration-none">
               <h5 class="my-4 mx-5"><i class="fa-solid fa-users me-2"></i>User List</h5>
           </a>
           <a href="{{ route('admin#contact') }}" class="text-light text-decoration-none">
               <h5 class="my-4 mx-5"><i class="fa-solid fa-envelope me-2 "></i>Message</h5>
           </a>
       </div>
       <div class="col-md-10">
        @yield('content')
    </div>
</div>

</body>
<!-- bootstrap -->

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>
