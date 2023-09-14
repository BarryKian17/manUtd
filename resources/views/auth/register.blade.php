

<!doctype html>
<html lang="en">
<head>
  <title>Register Page</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="/css/styles.css" rel="stylesheet">
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<body style="background-color:rgb(225, 1, 1)">

    {{-- nav bar --}}
    <ul class="nav shadow-lg py-1" style="background: rgb(255, 255, 255)" >
      <img src="{{ asset('img/logo2.png') }}" style="width: 85px; height:70px" class="ms-2" alt="">
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
        <div class="col-6 ">
    <div class="">
        <div class=""  style="background-color: #ffffff">
          <form action="{{ route('register') }}" method="POST">
              @csrf
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <h2 class="text-center text-danger pt-1">Register</h2><br>
            <div class="user-box mx-5">
                <label class="text-danger fw-bold">Your Name</label>
                <input type="text" name="name" class="my-2 w-100 text-danger p-1 fw-bold form-control @error('name') is-invalid @enderror">

                @error('name')
                    <p class="text-dark">*{{ $message }}*</p>
                @enderror
              </div>
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
              <div class="user-box mx-5">
                <label class="text-danger fw-bold">Confirm Password</label>
                <input type="password" name="password_confirmation" class="my-2 w-100 text-danger p-1 fw-bold form-control @error('password') is-invalid @enderror">

                @error('password')
                <p class="text-dark">*{{ $message }}*</p>
            @enderror
              </div>



            <!-- Submit button -->
            <div class="submit-box mt-3 text-center">
                <button type="submit" class="btn btn-danger fw-bold w-25">Register</button>
               </div>
              {{-- Login --}}

              <div class="text-center text-white mb-3 mt-2">
                <h5 class="text-center my-3 text-danger fs-5">Already Have an account?</h5>

                  <div class="mt-2 pb-4">
                     <a href="{{ route('login') }}">
                        <button type="button" class="btn btn-danger fw-bold w-25">Login Here</button>
                    </a>
                    </div>

              </div>

          </form>
        </div>
      </div>
</div>
        </body>
        <!-- bootstrap -->
        <script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        </script>
        </html>
