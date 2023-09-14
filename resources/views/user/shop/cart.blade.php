@extends('user.layouts.master')

@section('title','Store')

@section('content')

<h3 class="text-center mt-2">Cart</h3>

<div class="row">
    <div class="d-flex">
        <div class="col-10 offset-1" style="height: 465px">
            <div class="table-responsive table-responsive-data2 col-10 offset-1 mt-5">
                <table class="table table-data2 text-center">
                    <thead>
                        <tr>
                            <th class="col-3">Image</th>
                            <th class="col-4">Product</th>
                            <th class="col-2" >Quantity</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                            @foreach ($userOrder as $t)
                            <tr>
                                <td >
                                    <img src="{{ asset('storage/store/'.$t->image) }}" style="width: 60px; height: 60px" alt="">
                                </td>
                                <td class="">{{ $t->name }}</td>
                                <td>{{ $t->qty }}</td>
                                <td>{{ $t->qty*$t->price }}</td>
                                <td>
                                    @if ($t->status == 0)
                                       <p class="text-white bg-warning p-1 fw-bold">Pending</p>
                                    @elseif ($t->status == 1)
                                    <p class="bg-success text-white p-1 fw-bold">Accepted</p>
                                    @elseif ($t->status == 2)
                                    <p class="bg-danger text-white p-1 fw-bold">Rejected</p>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                    </tbody>
                </table>
                {{ $userOrder->links() }}
            </div>
        </div>
    </div>
</div>
  @endsection
