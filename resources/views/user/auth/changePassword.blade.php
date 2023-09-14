@extends('user.layouts.master')

@section('title','Password Change')

@section('content')

  <div class="container mt-3 mb-5" style="height: 465px">

  <div class="col-6 offset-3 mt-5">
    <div class=" card mt-3">
        <div class="rounded" >
          <form action="{{ route('user#changePassword') }}" method="POST" novalidate="novalidate">
              @csrf
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <h2 class="text-center text-dark pt-1">Change Password</h2><br>
            <div class="form-group mx-5">
                <label  class="control-label mb-1">Old Password</label>
                <input  name="oldPassword" type="password" value="" class="my-2 w-100 text-black p-1  form-control @if(session('not')) is-invalid @endif @error('oldPassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Old Password...">
                @error('oldPassword')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                @if(session('not'))
                <div class="invalid-feedback text-danger">
                    {{session('not')}}
                </div>
                @endif
            </div>
              <div class="user-box mx-5">
                <label class="text-dark">New Password</label>
                <input type="password" name="newPassword" class="my-2 w-100 text-black p-1  form-control @error('newPassword') is-invalid @enderror"  placeholder="Enter New Password...">

                @error('newPassword')
                    <p class="text-danger">*{{ $message }}*</p>
                @enderror
              </div>
              <div class="user-box mx-5">
                <label class="text-dark">Confirm Password</label>
                <input type="password" name="confirmPassword" class="my-2 w-100 text-black p-1  form-control @error('confirmPassword') is-invalid @enderror"  placeholder="Enter Confirm Password...">

                @error('confirmPassword')
                    <p class="text-danger">*{{ $message }}*</p>
                @enderror
              </div>
              <!-- Submit button -->
            <div class="submit-box my-3 text-center">
                <button type="submit" class="btn btn-danger fw-bold w-25 mb-3">Change Password</button>
               </div>
            </form>
        </div>
      </div>


  </div>
</div>
  @endsection
