@extends('Admin.layouts.master')

@section('title','Ticket List')

@section('content')

        <h3 class="text-center mt-2">Ticket List</h3>
        <div class="mx-5">
            <a href="{{ route('admin#ticketOrderPage') }}">
                <button type="button" class="btn btn-danger position-relative px-3 fw-bold">
                    Order List
                    @if (count($order) != 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                        {{ count($order) }}
                        <span class="visually-hidden">unread messages</span>
                    @endif
                    </span>
                  </button>
            </a>
        </div>
        <div class="text-end mx-5">
            <a href="{{ route('admin#ticketCreatePage') }}">
                <button class="btn btn-danger">
                    <i class="fa-solid fa-plus me-2"></i>Add Ticket
                </button>
            </a>
        </div>
        <div class="table-responsive table-responsive-data2 col-10 offset-1 mt-5">
            <table class="table table-data2 text-center">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Match</th>
                        <th>Ticket Category</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ticket as $t)
                        <tr>
                            <td>{{ $t->date }}</td>
                            <td>{{ $t->home_team }} Vs {{ $t->away_team }}</td>
                            <td>{{ $t->category_name }}</td>
                            <td>{{ $t->price }} $</td>
                            <td>
                                <a href="{{ route('admin#ticketEditPage',$t->ticket_id) }}">
                                    <button class="mx-2 btn btn-danger rounded-circle">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </a>
                                <a href="{{ route('admin#ticketDelete',$t->ticket_id) }}">
                                    <button class="mx-2 btn btn-danger rounded-circle">
                                        <i class="fa-sharp fa-solid fa-trash"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $ticket->links() }}
        </div>
@endsection
