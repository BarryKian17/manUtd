@extends('Admin.layouts.master')

@section('title','Contact List')

@section('content')

        <h3 class="text-center mt-2">Message List</h3>
        <div class="table-responsive table-responsive-data2 col-10 offset-1 mt-5">
            <table class="table table-data2 text-center">
                <thead>
                    <tr>
                        <th class="col-2">User'email</th>
                        <th class="col-8">Message</th>
                        <th class="col-2">Sent_at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($message as $p)
                    <tr>
                        <td>{{ $p->user_email }}</td>
                        <td>{{ $p->message }}</td>
                        <td>{{ $p->created_at->format('j-F-Y') }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
