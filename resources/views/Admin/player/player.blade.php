@extends('Admin.layouts.master')

@section('title','Player List')

@section('content')

        <h3 class="text-center mt-2">Player List</h3>
        <div class="text-end mx-5">
            <a href="{{ route('admin#playerCreatePage') }}">
                <button class="btn btn-danger">
                    <i class="fa-solid fa-plus me-2"></i>Add Player
                </button>
            </a>
        </div>
        <div class="table-responsive table-responsive-data2 col-10 offset-1">
            <table class="table table-data2 text-center">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Position</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($player as $p)
                    <tr>
                        <td class=""><img src="{{ asset('storage/player/'.$p->image) }}" style="width: 80px; height: 80px" alt=""></td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->number }}</td>
                        <td>{{ $p->role }}</td>
                        <td>
                            <a href="{{ route('admin#playerEditPage',$p->id) }}">
                                <button class="mx-2 btn btn-danger rounded-circle">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </a>
                            <a href="{{ route('admin#playerDelete',$p->id) }}">
                                <button class="mx-2 btn btn-danger rounded-circle">
                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $player->links() }}
        </div>
@endsection
