@extends('user.layouts.master')

@section('title','Ticket')

@section('content')

<h3 class="text-center mt-2">Ticket</h3>
<div class="">
    <a href="{{ route('user#ticketCart') }}"><button class="btn btn-danger mb-2 mx-4"><i class="fa-solid fa-cart-shopping"></i></button></a>
</div>
<div class="table-responsive table-responsive-data2 col-10 offset-1 mt-3"  style="height: 400px">
    <table class="table table-data2 text-center">
        <thead>
            <tr>
                <th>Date</th>
                <th>Home Team</th>
                <th></th>
                <th>Away Team</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fixture as $f)
             <tr>
                <td>{{ $f->date }}</td>
                <td>{{ $f->home_team }}</td>
                <td>Vs</td>
                <td>{{ $f->away_team }}</td>
                <td>
                    <a href="{{ route('user#ticketMatch',$f->id) }}">
                        <button class="btn btn-danger">
                            Buy Ticket
                        </button>
                    </a>
                </td>
             </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $fixture->links() }}
@endsection
