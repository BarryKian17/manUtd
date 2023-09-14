@extends('Admin.layouts.master')

@section('title','Order List')

@section('content')

        <h3 class="text-center mt-2">Order List</h3>
        <div class="d-flex justify-content-end">
            <div class="mx-1">
                <a href="{{ route('admin#storeAcceptOrderPage') }}">
                    <button class="btn btn-success">
                        Accepted Order List
                    </button>
                </a>
            </div>
            <div class="mx-1">
                <a href="{{ route('admin#storeRejectOrderPage') }}">
                    <button class="btn btn-danger">
                        Rejected Order List
                    </button>
                </a>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2 col-10 offset-1 mt-5">
            <table class="table table-data2 text-center">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>User's Email</th>
                        <th>Produnct's Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $p)
                    <tr>
                        <td class="">
                            <img src="{{ asset('storage/store/'.$p->image) }}" style="width: 50px; height: 50px" alt="">

                        </td>
                        <td>{{ $p->user_email }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->price }}</td>
                        <td>{{ $p->qty }}</td>
                        <td>{{ $p->total }}</td>
                        <td>
                            <a href="{{ route('admin#storeReject',$p->store_order_id) }}">
                                <button class="mx-2 btn btn-danger rounded-circle">
                                    <i class="fa-solid fa-x"></i>
                                </button>
                            </a>
                            <a href="{{ route('admin#storeAccept',$p->store_order_id) }}">
                                <button class="mx-2 btn btn-danger rounded-circle">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
