

<!doctype html>
<html lang="en">
<head>
  <title>Login Page</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="/css/styles.css" rel="stylesheet">
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<body style="background-color:rgb(225, 1, 1)">

  {{-- nav bar --}}
  <ul class="nav shadow-lg py-1" style="background: rgb(255, 255, 255)" >
    <img src="{{ asset('img/logo2.png') }}" style="width: 85px; height:70px" class="ms-1" alt="">
    <h2 class=" mt-2 p-2 fw-bold" style="color:rgb(225, 1, 1)">Manchester United</h2>
  </ul>

    <section class="">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start">
          <div class="container">
            <div class="row gx-lg-5 align-items-center">
              <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="">
                    <h1 class="text-white mb-5">The Reds Official Website</h1>
                    <img src="{{ asset('img/manu.jpg') }}" class="shadow-sm img-thumbnail" style="width: 550px; height: 400px" alt="">

                </div>
              </div>

              <div class="col-lg-6 mb-5 mb-lg-0" style="background-color:rgb(255, 255, 255)">
                <div class="">

                    <form class="" action="{{ route('login') }}" method="POST" >
                        @csrf
                        <h2 class="text-center text-danger">Login</h2><br>
                      <div class="user-box mx-5">
                        <label class="text-danger fw-bold">Your Email</label>
                        <input type="email" name="email" class="my-2 w-100 text-danger p-1 fw-bold form-control @error('email') is-invalid @enderror">

                        @error('email')
                            <p class="text-dark">*{{ $message }}*</p>
                        @enderror
                      </div>
                      <div class="user-box mx-5">
                        <label class="text-danger fw-bold">Password</label>
                        <input type="password" name="password" class="my-2 w-100 text-danger p-1 fw-bold form-control @error('password') is-invalid @enderror">

                        @error('password')
                        <p class="text-dark">*{{ $message }}*</p>
                    @enderror
                      </div>
                   <div class="submit-box mt-3 text-center">
                    <button type="submit" class="btn btn-danger fw-bold w-25">Login</button>
                   </div>
                   <h5 class="text-center my-3 text-danger fs-4">Don't have an account?</h5>
                   <div class="submit-box text-center">
                    <a href="{{ route('register') }}">
                        <button type="button" class="btn btn-danger fw-bold w-25 mb-3" >Register Here</button>
                    </a>
                   </div>
                    </form>
                  </div>
              </div>
            </div>


        <!-- Jumbotron -->
      </section>
</body>
<script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   </script>
</html>
