@extends('Admin.layouts.master')

@section('title','Result Update')

@section('content')


        <div class="mt-4 mx-5 col-1 ">
            <a href="{{ route('admin#result') }}">
                <button class="btn btn-danger w-100">
                    <i class="fa-solid fa-arrow-left me-2"></i>Back
                </button>
            </a>
        </div>
      <div class="col-6 offset-3 mt-3">
        <div class=" card">
            <div class="rounded" >
              <form action="{{ route('admin#resultUpdate') }}" method="POST" novalidate="novalidate">
                  @csrf
                <h2 class="text-center text-dark pt-1">Result Edit</h2><br>
                <input type="text" name="id" value="{{ $result->id }}" hidden>
                <input type="text" name="match_id" hidden value="{{ $match->id }}">
                <div class="user-box mx-5 d-flex">
                    <label class="text-dark fw-bold mt-2 me-3 fs-5">{{ $match->home_team }}</label>
                    <label class="text-dark fw-bold mt-2 me-3 fs-5">-</label>
                    <input type="number" name="homeGoal" class="my-2 w-100 text-black p-1 fw-bold form-control @error('homeGoal') is-invalid @enderror" value="{{ $result->home_goal }}" >

                    @error('homeGoal')
                        <p class="text-danger">*{{ $message }}*</p>
                    @enderror
                  </div>
                  <div class="user-box mx-5 d-flex">
                    <label class="text-dark fw-bold mt-2 me-3 fs-5">Date</label>
                    <label class="text-dark fw-bold mt-2 me-3 fs-5">-</label>
                    <input type="date" class="my-2 w-100 text-black p-1 fw-bold form-control" disabled value="{{ \Carbon\Carbon::parse($match->date)->format('Y-m-d') }}">
                  </div>
                  <div class="user-box mx-5 d-flex">
                    <label class="text-dark fw-bold mt-2 me-3 fs-5">{{ $match->away_team }}</label>
                    <label class="text-dark fw-bold mt-2 me-3 fs-5">-</label>
                    <input type="number" name="awayGoal" class="my-2 w-100 text-black p-1 fw-bold form-control @error('awayGoal') is-invalid @enderror"  value="{{ $result->away_goal }}" >

                    @error('awayGoal')
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
        </div>

@endsection
