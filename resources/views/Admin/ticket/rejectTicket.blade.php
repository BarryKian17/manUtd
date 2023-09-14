@extends('Admin.layouts.master')

@section('title','Ticket Accepted List')

@section('content')

        <h3 class="text-center mt-2">Ticket Order Rejected List</h3>
        <div class="d-flex mx-2">
            <div class="mx-1">
                <a href="{{ route('admin#ticketOrderPage') }}">
                    <button class="btn btn-danger">
                        Back
                    </button>
                </a>
            </div>

        </div>
        <div class="table-responsive table-responsive-data2 col-12 mx-4 mt-5">
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
                            <p class="bg-danger text-white p-1">Rejected</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
