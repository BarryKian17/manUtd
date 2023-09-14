@extends('user.layouts.master')

@section('title','Result')

@section('content')

<h3 class="text-center mt-2">Result</h3>
<div class="table-responsive table-responsive-data2 col-10 offset-1 mt-3"  style="height: 458px">
    <table class="table table-data2 text-center">
        <thead>
            <tr>
                <th>Date</th>
                <th>Home Team</th>
                <th>Home Team's Goal</th>
                <th></th>
                <th>Away Team's Goal</th>
                <th>Away Team</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result as $r)
             <tr class="">
                <td>{{ $r->date }}</td>
                <td>{{ $r->home_team }}</td>
                <td>{{ $r->home_goal }}</td>
                <td>-</td>
                <td>{{ $r->away_goal }}</td>
                <td>{{ $r->away_team }}</td>
             </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $result->links() }}
@endsection
