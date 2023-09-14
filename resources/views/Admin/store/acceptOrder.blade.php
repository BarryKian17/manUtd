@extends('Admin.layouts.master')

@section('title','Accept Order')

@section('content')

        <h3 class="text-center mt-2">Accepted Order List</h3>
        <div class="d-flex">
            <div class="mx-1">
                <a href="{{ route('admin#storeOrderPage') }}">
                    <button class="btn btn-danger">
                        Back
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
                            <p class="bg-success text-white p-1">Accepted</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
