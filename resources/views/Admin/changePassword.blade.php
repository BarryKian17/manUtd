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
        <div class="card ">
            <div class="card-body rounded">
                <div class="card-title">
                    <h3 class="text-center title-2 mb-3">Change Your Password</h3>
                </div>

                @if (session('changeSuccess'))
        <div class="">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session ('changeSuccess') }}  <i class="fa-sharp fa-solid fa-square-check"></i></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        </div>
        @endif
                <form action="{{route('admin#changePassword')}}" method="post" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label  class="control-label mb-1">Old Password</label>
                        <input  name="oldPassword" type="password" value="" class="form-control @if(session('notMatch')) is-invalid @endif @error('oldPassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Old Password...">
                        @error('oldPassword')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        @if(session('notMatch'))
                        <div class="invalid-feedback text-danger">
                            {{session('notMatch')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label  class="control-label mb-1">New Password</label>
                        <input  name="newPassword" type="password" value="" class="form-control @error('newPassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter New Password...">
                        @error('newPassword')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label  class="control-label mb-1">Confirm Password</label>
                        <input  name="confirmPassword" type="password" value="" class="form-control @error('confirmPassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Confirm Password...">
                        @error('confirmPassword')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button id="payment-button" type="submit" class="btn btn-danger btn-block mt-3 ">
                            <span id="payment-button-amount">Change Password</span>
                            <i class="mx-1 fa-solid fa-lock"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>


@endsection
