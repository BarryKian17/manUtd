@extends('user.layouts.master')

@section('title','Home')

@section('content')

  <div class="container mt-3 mb-5" style="height: 500px">
    <div class="row">
        @foreach ($post as $p)
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">

        <div class="product-item bg-light mb-4"  id="myForm">
            <div class="product-img position-relative overflow-hidden">
                <a href=""><img class="img-fluid w-100" src="{{ asset('storage/post/'.$p->image) }}" alt="" style="height: 300px"> </a>
            </div>
            <div class=" mx-2 py-4">
                <a class="h5 text-decoration-none text-truncate d-block text-danger fs-5 fw-bold" href="">{{ $p->title }}</a>

                <div class="d-block mt-2">
                    <p >{{ $p->description }}</p>
                </div>

            </div>
        </div>

        </div>
        @endforeach
        {{ $post->links() }}
    </div>
  </div>

  @endsection
