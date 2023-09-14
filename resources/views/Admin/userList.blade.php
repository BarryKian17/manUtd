@extends('Admin.layouts.master')

@section('title','User List')

@section('content')

        <h3 class="text-center mt-2">User List</h3>
        <div class="table-responsive table-responsive-data2 col-10 offset-1 mt-5">
            <table class="table table-data2 text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User's Name</th>
                        <th >User'email</th>
                        <th >Created_at</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->created_at->format('j-F-Y') }}</td>
                        <td>
                            <a href="{{ route('admin#userDelete',$p->id) }}">
                                <button class="mx-2 btn btn-danger rounded-circle">
                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                </button>
                            </a>
                            <a href="{{ route('admin#changeRolePage',$p->id) }}">
                                <button class="mx-2 btn btn-danger">
                                    Change Role to Admin
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
