@extends('user.layouts.master')

@section('title','Store')

@section('content')

  <div class="container mt-3 mb-5" >
    <div class="">
        <a href="{{ route('user#storeCart') }}"><button class="btn btn-danger mb-2"><i class="fa-solid fa-cart-shopping"></i></button></a>
    </div>
    <div class="row">
        @foreach ($store as $p)

        <div class="col-lg-3 col-md-4 col-sm-6 pb-1 shadow-sm">
            <a href="{{ route('user#storeDetail',$p->id) }}">
        <div class="product-item bg-light mb-4"  id="myForm">
            <div class="product-img position-relative overflow-hidden">
              <img class="img-fluid w-100" src="{{ asset('storage/store/'.$p->image) }}" alt="" style="height: 300px">
            </div>
            <div class=" mx-2 py-4">
                <a class="h5 text-decoration-none text-truncate d-block text-danger fs-5 fw-bold" href="{{ route('user#storeDetail',$p->id) }}">{{ $p->name }}</a>

                <div class="d-block mt-2">
                    <p ><i class="fa-solid fa-money-bill me-1"></i>{{ $p->price }} $</p>
                </div>

            </div>
        </div>

        </div>
        @endforeach
        {{ $store->links() }}
    </div></a>
  </div>

  @endsection
