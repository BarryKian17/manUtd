<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- fontaweson --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
</style>
<body style="">
  {{-- nav bar --}}
  <nav class="navbar navbar-expand-lg shadow-sm" style="background: rgb(225, 0, 0)" >
    <div class="container-fluid">
        <ul class="nav " >

            <a href="{{ route('user#home') }}" class="text-decoration-none"><img src="{{ asset('img/logo.jpg') }}" style="width: 50px; height:50px" class="ms-2 mt-1" alt=""></a>
            <a href="{{ route('user#home') }}" class="text-decoration-none"><h2 class="m-1 p-2 fw-bold mt-1 text-white ">Manchester United</h2></a>

          </ul>
           <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="{{ route('user#home') }}"><i class="fa-solid fa-house me-1"></i>Home |</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('user#store') }}"><i class="fa-solid fa-store me-1"></i>Shop |</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('user#fixture') }}"><i class="fa-solid fa-calendar-days me-1"></i>Fixture |</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('user#ticket') }}"><i class="fa-solid fa-ticket me-1"></i>Ticket |</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('user#result') }}"><i class="fa-solid fa-futbol me-1"></i>Result |</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('user#player') }}"><i class="fa-solid fa-users me-1"></i>Player |</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('user#contact') }}"><i class="fa-solid fa-paper-plane me-1"></i>Contact Us</a>
              </li>
            </ul>

          </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="nav-item dropdown text-end me-5 text-white">
        <a class="nav-link dropdown-toggle me-5 fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <i class="fa-solid fa-user me-2"></i>{{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('user#account') }}">Account Info</a></li>
          <li><a class="dropdown-item" href="{{ route('user#changePasswordPage') }}">Change Password</a></li>
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

@yield('content')

<div class="footer mt-5" style="background: rgb(225, 0, 0)">
    <div class="row">
        <div class="d-flex justify-content-center p-4">
            <h5 class="text-white mx-2">Follow Us On</h5>
            <a target="_blank" href="https://www.facebook.com/manchesterunited?mibextid=ZbWKwL"><i class="fa-brands fa-facebook text-white fs-3 mx-2"></i></a>
            <a target="_blank" href="https://youtube.com/@manutd?si=U74i8Hq8vbSfbGB6"><i class="fa-brands fa-youtube text-white fs-3 mx-2"></i></a>
            <a target="_blank" href="https://twitter.com/ManUtd?s=35"><i class="fa-brands fa-twitter text-white fs-3 mx-2"></i></a>
            <a target="_blank" href="https://instagram.com/manchesterunited?igshid=MzRlODBiNWFlZA=="><i class="fa-brands fa-instagram text-white fs-3 mx-2"></i></a>
            <a target="_blank" href="https://www.tiktok.com/@manutd?_t=8fULdjIqs0A&_r=1"><i class="fa-brands fa-tiktok text-white fs-3 mx-2"></i></a>
        </div>
    </div>
</div>
</body>
{{-- Bootstrap --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@yield('js')
</html>


