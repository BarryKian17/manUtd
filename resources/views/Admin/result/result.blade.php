@extends('Admin.layouts.master')

@section('title','Result')

@section('content')

        <h3 class="text-center mt-2">Result</h3>
        <div class="text-end mx-5">
            <a href="{{ route('admin#fixture') }}">
                <button class="btn btn-danger">
                    <i class="fa-solid fa-plus me-2"></i>Add Result
                </button>
            </a>
        </div>
        <div class="table-responsive table-responsive-data2 col-10 offset-1 mt-5">
            <table class="table table-data2 text-center">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Home Team</th>
                        <th>Home Score</th>
                        <th></th>
                        <th>Away Score</th>
                        <th>Away Team</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $r)
                    <tr>
                        <td>{{ $r->date }}</td>
                        <td>{{ $r->home_team }}</td>
                        <td>{{ $r->home_goal }}</td>
                        <td>-</td>
                        <td>{{ $r->away_goal }}</td>
                        <td>{{ $r->away_team }}</td>
                        <td>
                            <a href="{{ route('admin#resultEditPage',$r->id) }}">
                                <button class="mx-2 btn btn-danger rounded-circle">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </a>
                            <a href="{{ route('admin#resultDelete',$r->id) }}">
                                <button class="mx-2 btn btn-danger rounded-circle">
                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $result->links() }}
        </div>
@endsection
