@extends('Admin.layouts.master')

@section('title','Team Edit')

@section('content')

        <h3 class="text-center mt-2">Team List</h3>
        <div class="text-end mx-5">
            <a href="{{ route('admin#teamList') }}">
                <button class="btn btn-danger">
                    <i class="fa-solid fa-plus me-2"></i>Add Team
                </button>
            </a>
        </div>
        <div class="row">
            <div class="d-flex">
                <div class="col-6">
                    <div class="table-responsive table-responsive-data2 col-10 offset-1 mt-5">
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr>
                                    <th class="col-1">ID</th>
                                    <th class="col-3">Image</th>
                                    <th class="col-4" >Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $t)
                                <tr>
                                    <td>{{ $t->id }}</td>
                                    <td >
                                        <img src="{{ asset('storage/team/'.$t->image) }}" style="width: 40px; height: 40px" alt="">
                                    </td>
                                    <td class="justify-content-center">{{ $t->name }}</td>
                                    <td>
                                        <a href="{{ route('admin#teamEditPage',$t->id) }}">
                                            <button class="mx-2 btn btn-danger rounded-circle">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('admin#teamDelete',$t->id) }}">
                                            <button class="mx-2 btn btn-danger rounded-circle"  @if ($t->id == $team->id)
                                                hidden
                                            @endif>
                                                <i class="fa-sharp fa-solid fa-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $list->links() }}
                    </div>
                </div>
                <div class="col-6">
                    <div class=" card mt-4">
                        <div class="rounded" >
                          <form action="{{ route('admin#teamUpdate') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                              @csrf
                              <input type="text" name="id" hidden value="{{ $team->id }}">
                            <h2 class="text-center text-dark pt-1">Team Edit</h2><br>
                            <div class="user-box mx-5">
                                <label class="text-dark">Team Name</label>
                                <input type="text" name="name" class="my-2 w-100 text-black p-1 fw-bold form-control @error('name') is-invalid @enderror" value="{{ $team->name }}" >

                                @error('name')
                                    <p class="text-danger">*{{ $message }}*</p>
                                @enderror
                              </div>
                            <div class="user-box mx-5">
                                <img src="{{ asset('storage/team/'.$team->image) }}" style="width: 300px; height: 300px" alt="">
                                <input type="file" name="image" class="my-2 w-100 text-black p-1 fw-bold form-control @error('image') is-invalid @enderror">

                                @error('image')
                                    <p class="text-danger">*{{ $message }}*</p>
                                @enderror
                              </div>
                              <!-- Submit button -->
                            <div class="submit-box my-3 text-center">
                                <button type="submit" class="btn btn-danger fw-bold w-25 mb-3">Update</button>
                               </div>


                          </form>
                        </div>
                      </div>
                </div>
            </div>
        </div>
@endsection
