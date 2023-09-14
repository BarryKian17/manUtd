@extends('user.layouts.master')

@section('title','Home')

@section('content')

  <div class="container mt-3 mb-5">

    {{-- Goalkeeper --}}
    <div class="">
        <button class="btn btn-danger mb-3 w-25 text-start fw-bold">Goalkeeper</button>
    </div>
    <div class="row">
        @foreach ($gk as $g)
        <div class="col-lg-2 col-md-4 col-sm-6 pb-1">

        <div class="product-item bg-light mb-4" >
            <div class="product-img position-relative overflow-hidden">
                <a href=""><img class="img-fluid w-100" src="{{ asset('storage/player/'.$g->image) }}" alt="" style="height: 150px"> </a>
            </div>
            <div class=" mx-2 py-4"  style="height: 110px">
                <a class="h5 text-decoration-none text-truncate d-block text-danger fs-5 fw-bold" href="">{{ $g->name }}</a>

                <div class="d-block mt-2">
                    <p >{{ $g->detail }}</p>
                </div>

            </div>
            <p class="bg-danger text-white text-end"><span class="me-2">{{ $g->number }}</span></p>
        </div>

        </div>
        @endforeach
    </div>
<hr>
    {{-- Defender   --}}
    <div class="">
        <button class="btn btn-danger mb-3 w-25 text-start fw-bold">Defender</button>
    </div>
    <div class="row">
        @foreach ($def as $d)
        <div class="col-lg-2 col-md-4 col-sm-6 pb-1">

        <div class="product-item bg-light mb-4" >
            <div class="product-img position-relative overflow-hidden">
                <a href=""><img class="img-fluid w-100" src="{{ asset('storage/player/'.$d->image) }}" alt="" style="height: 150px"> </a>
            </div>
            <div class=" mx-2 py-4"  style="height: 110px">
                <a class="h5 text-decoration-none text-truncate d-block text-danger fs-5 fw-bold" href="">{{ $d->name }}</a>

                <div class="d-block mt-2">
                    <p >{{ $d->detail }}</p>
                </div>

            </div>
            <p class="bg-danger text-white text-end"><span class="me-2">{{ $d->number }}</span></p>
        </div>

        </div>
        @endforeach
    </div>
<hr>
    {{-- midfielder --}}
    <div class="">
        <button class="btn btn-danger mb-3 w-25 text-start fw-bold">Midfielder</button>
    </div>
    <div class="row">
        @foreach ($mid as $m)
        <div class="col-lg-2 col-md-4 col-sm-6 pb-1">

        <div class="product-item bg-light mb-4" >
            <div class="product-img position-relative overflow-hidden">
                <a href=""><img class="img-fluid w-100" src="{{ asset('storage/player/'.$m->image) }}" alt="" style="height: 150px"> </a>
            </div>
            <div class=" mx-2 py-4"  style="height: 110px">
                <a class="h5 text-decoration-none text-truncate d-block text-danger fs-5 fw-bold" href="">{{ $m->name }}</a>

                <div class="d-block mt-2">
                    <p >{{ $m->detail }}</p>
                </div>

            </div>
            <p class="bg-danger text-white text-end"><span class="me-2">{{ $m->number }}</span></p>
        </div>

        </div>
        @endforeach
    </div>
<hr>
    {{-- Attacker --}}
    <div class="">
        <button class="btn btn-danger mb-3 w-25 text-start fw-bold">Forwards</button>
    </div>
    <div class="row">
        @foreach ($att as $a)
        <div class="col-lg-2 col-md-4 col-sm-6 pb-1" >

        <div class="product-item bg-light mb-4"  >
            <div class="product-img position-relative overflow-hidden">
                <a href=""><img class="img-fluid w-100" src="{{ asset('storage/player/'.$a->image) }}" alt="" style="height: 150px"> </a>
            </div>
            <div class=" mx-2 py-4" style="height: 110px">
                <a class="h5 text-decoration-none text-truncate d-block text-danger fs-5 fw-bold" href="">{{ $a->name }}</a>

                <div class="d-block mt-2">
                    <p >{{ $a->detail }}</p>
                </div>

            </div>
            <p class="bg-danger text-white text-end"><span class="me-2">{{ $a->number }}</span></p>
        </div>

        </div>
        @endforeach
    </div>
</div>
<hr>
  @endsection
