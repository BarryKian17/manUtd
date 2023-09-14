@extends('user.layouts.master')

@section('title','Fixture')

@section('content')

<h3 class="text-center mt-2">Fixture</h3>
<div class="table-responsive table-responsive-data2 col-10 offset-1 mt-3"  style="height: 455px">
    <table class="table table-data2 text-center">
        <thead>
            <tr>
                <th>Date</th>
                <th>Home Team</th>
                <th></th>
                <th>Away Team</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($fixture as $f)
             <tr>
                <td>{{ $f->date }}</td>
                <td>{{ $f->home_team }}</td>
                <td>Vs</td>
                <td>{{ $f->away_team }}</td>
             </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $fixture->links() }}
@endsection
