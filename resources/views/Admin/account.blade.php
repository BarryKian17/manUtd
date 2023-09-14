@extends('Admin.layouts.master')

@section('title','Admin Home')

@section('content')


        <div class="mt-4 mx-5 col-1 ">
            <a href="{{ route('admin#home') }}">
                <button class="btn btn-danger w-100">
                    <i class="fa-solid fa-arrow-left me-2"></i>Back
                </button>
            </a>
        </div>
      <div class="col-6 offset-3 mt-3">
        <div class=" card">
            <div class="rounded" >
              <form action="{{ route('admin#accountEdit') }}" method="POST" novalidate="novalidate">
                  @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <input type="text" name="userId" value="{{ Auth::user()->id }}" hidden>
                <h2 class="text-center text-dark pt-1">Account Info</h2><br>
                <div class="user-box mx-5">
                    <label class="text-dark">Your Name</label>
                    <input type="text" name="name" class="my-2 w-100 text-black p-1 fw-bold form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}">

                    @error('name')
                        <p class="text-danger">*{{ $message }}*</p>
                    @enderror
                  </div>
                <div class="user-box mx-5">
                    <label class="text-dark">Your Email</label>
                    <input type="email" name="email" class="my-2 w-100 text-black p-1 fw-bold form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}">

                    @error('email')
                        <p class="text-danger">*{{ $message }}*</p>
                    @enderror
                  </div>
                  <!-- Submit button -->
                <div class="submit-box my-3 text-center">
                    <button type="submit" class="btn btn-danger fw-bold w-25 mb-3">Update</button>
                   </div>


              </form>
            </div>
          </div>


@endsection
