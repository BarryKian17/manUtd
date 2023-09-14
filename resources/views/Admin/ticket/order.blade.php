@extends('Admin.layouts.master')

@section('title','Ticket Order List')

@section('content')

        <h3 class="text-center mt-2">Ticket Order List</h3>
        <div class="d-flex justify-content-end">
            <div class="mx-1">
                <a href="{{ route('admin#ticketAcceptPage') }}">
                    <button class="btn btn-success">
                        Accepted Order List
                    </button>
                </a>
            </div>
            <div class="mx-1">
                <a href="{{ route('admin#ticketRejectPage') }}">
                    <button class="btn btn-danger">
                        Rejected Order List
                    </button>
                </a>
            </div>
        </div>
        <div class="table-responsive table-responsive-data2 col-12 mx-3 mt-5">
            <table class="table table-data2 text-center">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Match</th>
                        <th>User's Email</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($match as $p)
                    <tr>
                        <td>{{ $p->date }}</td>
                        <td>{{ $p->home_team }} vs {{ $p->away_team }}</td>
                        <td>{{ $p->user_email }}</td>
                        <td>{{ $p->category_name }}</td>
                        <td>{{ $p->price }}</td>
                        <td>{{ $p->qty }}</td>
                        <td>{{ $p->total }}</td>
                        <td>
                            <a href="{{ route('admin#ticketReject',$p->id) }}">
                                <button class="mx-2 btn btn-danger rounded-circle">
                                    <i class="fa-solid fa-x"></i>
                                </button>
                            </a>
                            <a href="{{ route('admin#ticketAccept',$p->id) }}">
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
