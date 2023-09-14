@extends('user.layouts.master')

@section('title','Ticket Order')

@section('content')

<div class="d-flex mx-2 mt-3">
    <div class="mx-1">
        <a href="{{ route('user#ticket') }}">
            <button class="btn btn-danger">
                Back
            </button>
        </a>
    </div>

</div>
  <div class="container mt-3 mb-5" style="height: 500px">
    <div class="row">
        @foreach ($match as $p)
        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">

        <div class="product-item bg-light mb-4"  id="myForm">
            <div class=" mx-2 py-4">
                <a class="h5 text-decoration-none text-truncate d-block text-danger fs-5 fw-bold" href="">{{ $p->home_team }} Vs {{ $p->away_team }}</a>

                <div class="d-block mt-2">
                    <p >{{ $p->date }}</p>
                    <p>{{ $p->category_name }}</p>
                </div>
                <form action="{{ route('user#ticketOrder') }}" method="POST">
                    @csrf
                <div class="d-flex">
                    <input type="text" value="{{ $p->ticket_id }}" name="ticketId" hidden>
                    <input type="text" value="{{ Auth::user()->id }}" name="userId" hidden>
                        <input type="number" name="qty" value="1" class="form-control @error('qty') is-invalid @enderror mx-1">
                        <button class="btn btn-danger">Buy</button>
                    </div>
                    <div class="">
                        @error('qty')
                            {{ $message }}
                        @enderror
                    </div>
            </form>
            </div>
        </div>

        </div>
        @endforeach
    </div>
  </div>

  @endsection
