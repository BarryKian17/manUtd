@extends('Admin.layouts.master')

@section('title','Admin Home')

@section('content')

        <h3 class="text-center mt-2">Ticket Category List</h3>
        <div class="text-end mx-5">
            <a href="{{ route('admin#categoryCreate') }}">
                <button class="btn btn-danger">
                    <i class="fa-solid fa-plus me-2"></i>Add Category
                </button>
            </a>
        </div>
        <div class="table-responsive table-responsive-data2 col-10 offset-1 mt-5">
            <table class="table table-data2 text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td class="col-5">{{ $c->name }}</td>
                        <td>{{ $c->created_at->format('j-F-Y')  }}</td>
                        <td>{{ $c->updated_at->format('j-F-Y')  }}</td>
                        <td>
                            <a href="{{ route('admin#categoryEditPage',$c->id) }}">
                                <button class="mx-2 btn btn-danger rounded-circle">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </a>
                            <a href="{{ route('admin#categoryDelete',$c->id) }}">
                                <button class="mx-2 btn btn-danger rounded-circle">
                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


@endsection
