@extends('Admin.layouts.master')

@section('title','Post List')

@section('content')

        <h3 class="text-center mt-2">Post List</h3>
        <div class="text-end mx-5">
            <a href="{{ route('admin#postcreatePage') }}">
                <button class="btn btn-danger">
                    <i class="fa-solid fa-plus me-2"></i>Add Post
                </button>
            </a>
        </div>
        <div class="table-responsive table-responsive-data2 col-10 offset-1 mt-5">
            <table class="table table-data2 text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td class="col-5">
                            @if ($p->image == null)
                            <img src="{{ asset('storage/default.png') }}" style="width: 80px; height: 80px" alt="">
                            @else
                            <img src="{{ asset('storage/post/'.$p->image) }}" style="width: 80px; height: 80px" alt="">
                            @endif

                        </td>
                        <td>{{ $p->title }}</td>
                        <td>{{ $p->created_at->format('j-F-Y') }}</td>
                        <td>{{ $p->updated_at->format('j-F-Y') }}</td>
                        <td>
                            <a href="{{ route('admin#postEditPage',$p->id) }}">
                                <button class="mx-2 btn btn-danger rounded-circle">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </a>
                            <a href="{{ route('admin#postDelete',$p->id) }}">
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
