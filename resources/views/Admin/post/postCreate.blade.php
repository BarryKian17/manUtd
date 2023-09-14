@extends('Admin.layouts.master')

@section('title','Post Create')

@section('content')


        <div class="mt-4 mx-5 col-1 ">
            <a href="{{ route('admin#postList') }}">
                <button class="btn btn-danger w-100">
                    <i class="fa-solid fa-arrow-left me-2"></i>Back
                </button>
            </a>
        </div>
      <div class="col-6 offset-3 mt-3">
        <div class=" card">
            <div class="rounded" >
              <form action="{{ route('admin#postcreate') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                  @csrf
                <h2 class="text-center text-dark pt-1">Post Create</h2><br>
                <div class="user-box mx-5">
                    <label class="text-dark">Title</label>
                    <input type="text" name="title" class="my-2 w-100 text-black p-1 fw-bold form-control @error('title') is-invalid @enderror" >

                    @error('title')
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
                    <label class="text-dark">Description</label>
                    <textarea type="text" name="description" class="my-2 w-100 text-black p-1 fw-bold form-control @error('description') is-invalid @enderror" ></textarea>

                    @error('description')
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
