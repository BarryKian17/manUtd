@extends('user.layouts.master')

@section('title','Contact')

@section('content')

  <div class="container mt-3 mb-5 col-5" style="height: 500px">
        <div class="card p-5">
            <form action="{{ route('user#contactCreate') }}" method="POST">
                @csrf
                <h3 class="text-danger mb-2 text-center">Contact Form</h3>
                <h6>Email - {{ Auth::user()->email }}</h6>
                <label for="" class="form-label">Message</label>
                <input type="text" name="userId" hidden value="{{ Auth::user()->id }}">
                <textarea name="message" id="" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror" placeholder="Enter Your Message"></textarea>
                @error('message')
                    <p class="text-danger fw-bold">* {{ $message }} *</p>
                @enderror
                <div class="text-center"><button class="text-center fs-5 mt-3 btn btn-danger px-3">Submit <i class="fa-solid fa-paper-plane ms-1"></i></button></div>
            </form>
        </div>
  </div>

  @endsection
