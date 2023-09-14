@extends('user.layouts.master')

@section('title','Store Detail')

@section('content')

<div class="container mt-3 d-flex">
    <div class="">
        <button class="btn btn-danger" onclick="history.back()">
            Back
        </button>
    </div>
    <div class="col-6">
        <img class="img-fluid w-100" src="{{ asset('storage/store/'.$item->image) }}" alt="">
    </div>
    <div class="col-6 m-3">
        <form action="{{ route('user#storeOrder') }}" method="post">
            @csrf
        <h3 class="fw-bold">{{ $item->name }}</h3>
        <h4><i class="fa-solid fa-money-bill me-3"></i>{{ $item->price }} $</h4>
        <input type="text" name="storeId" hidden value="{{ $item->id }}">
        <input type="text" name="userId" hidden value="{{ Auth::user()->id }}">
        <input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror w-25">
        @error('qty')
            {{ $message }}
        @enderror
            <div class="">
                <button class="btn btn-lg btn-danger mt-5 mx-2">
                    Add to Cart
                </button>
            </div>
    </form>
    </div>
</div>

@endsection

