@extends('Admin.layouts.master')

@section('title','Player Create')

@section('content')


        <div class="mt-4 mx-5 col-1 ">
            <a href="{{ route('admin#player') }}">
                <button class="btn btn-danger w-100">
                    <i class="fa-solid fa-arrow-left me-2"></i>Back
                </button>
            </a>
        </div>
      <div class="col-6 offset-3 mt-3">
        <div class=" card">
            <div class="rounded" >
              <form action="{{ route('admin#playerCreate') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                  @csrf
                <h2 class="text-center text-dark pt-1">Player Create</h2><br>
                <div class="user-box mx-5">
                    <label class="text-dark">Name</label>
                    <input type="text" name="name" class="my-2 w-100 text-black p-1 fw-bold form-control @error('name') is-invalid @enderror" >

                    @error('name')
                        <p class="text-danger">*{{ $message }}*</p>
                    @enderror
                  </div>
                  <div class="user-box mx-5">
                    <label class="text-dark">Number</label>
                    <input type="number" name="number" class="my-2 w-100 text-black p-1 fw-bold form-control @error('number') is-invalid @enderror" >

                    @error('number')
                        <p class="text-danger">*{{ $message }}*</p>
                    @enderror
                  </div>
                  <div class="user-box mx-5 my-3">
                    <label class="text-dark">Position</label>
                    <select name="role" id="" class="form-control @error('role') is-invalid @enderror">
                        <option value="">Choose Position</option>
                        <option value="gk">Goalkeeper</option>
                        <option value="def">Defender</option>
                        <option value="mid">Midfielder</option>
                        <option value="att">Forward</option>
                    </select>
                    @error('role')
                        <p class="text-danger">*{{ $message }}*</p>
                    @enderror
                  </div>
                <div class="user-box mx-5">
                    <label class="text-dark">Image</label>
                    <input type="file" name="image" class="my-2 w-100 text-black p-1 fw-bold form-control @error('image') is-invalid @enderror">

                    @error('image')
                        <p class="text-danger">*{{ $message }}*</p>
                    @enderror
                  </div>
                  <div class="user-box mx-5">
                    <label class="text-dark">Detail</label>
                    <textarea type="text" name="detail" class="my-2 w-100 text-black p-1 fw-bold form-control @error('detail') is-invalid @enderror" ></textarea>

                    @error('detail')
                        <p class="text-danger">*{{ $message }}*</p>
                    @enderror
                  </div>
                  <!-- Submit button -->
                <div class="submit-box my-3 text-center">
                    <button type="submit" class="btn btn-danger fw-bold w-25 mb-3">Create</button>
                   </div>


              </form>
            </div>
          </div>
        </div>

@endsection
