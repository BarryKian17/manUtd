@extends('Admin.layouts.master')

@section('title','Ticket Edit')

@section('content')


        <div class="mt-4 mx-5 col-1 ">
            <a href="{{ route('admin#ticket') }}">
                <button class="btn btn-danger w-100">
                    <i class="fa-solid fa-arrow-left me-2"></i>Back
                </button>
            </a>
        </div>
      <div class="col-6 offset-3 mt-3">
        <div class=" card">
            <div class="rounded" >
              <form action="{{ route('admin#ticketUpdate') }}" method="POST" novalidate="novalidate">
                  @csrf
                <h2 class="text-center text-dark pt-1">Ticket Edit</h2><br>
                <input type="text" value="{{ $ticket->id }}" name="id" hidden>
                <div class="user-box mx-5 my-3">
                    <label class="text-dark">Match</label>
                    <select name="match" id="" class="form-control @error('match') is-invalid @enderror">
                        @foreach ($match as $m)
                            <option value="{{ $m->id }}" @if ($m->id == $ticket->match_id) selected @endif>{{ $m->home_team }} Vs {{$m->away_team}}   |   {{ $m->date }}</option>
                        @endforeach
                    </select>
                    @error('match')
                        <p class="text-danger">*{{ $message }}*</p>
                    @enderror
                  </div>
                <div class="user-box mx-5 my-3">
                    <label class="text-dark">Ticket Category</label>
                    <select name="category" id="" class="form-control @error('category') is-invalid @enderror">
                        @foreach ($category as $c)
                            <option value="{{ $c->id }}" @if ($c->id == $ticket->category_id) selected @endif>{{ $c->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-danger">*{{ $message }}*</p>
                    @enderror
                  </div>
                  <div class="user-box mx-5 my-3">
                    <label class="text-dark">Price</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $ticket->price }}">
                    @error('price')
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
