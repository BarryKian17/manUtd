@extends('Admin.layouts.master')

@section('title','Store List')

@section('content')

        <h3 class="text-center mt-2">Store</h3>
        <div class="mx-5">
            <a href="{{ route('admin#storeOrderPage') }}">
                <button type="button" class="btn btn-danger position-relative px-3 fw-bold">
                    Order List
                    @if (count($order) != 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                        {{ count($order) }}
                        <span class="visually-hidden">unread messages</span>
                    @endif
                    </span>
                  </button>
            </a>
        </div>
        <div class="row">
            <div class="d-flex">
                <div class="col-7">
                    <div class="table-responsive table-responsive-data2 col-10 offset-1 mt-5">
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr>

                                    <th class="">Image</th>
                                    <th class="">Name</th>
                                    <th class="" >Price</th>
                                    <th class=""></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $t)
                                <tr>
                                    <td><img src="{{ asset('storage/store/'.$t->image) }}" style="width: 60px; height: 60px" alt=""></td>
                                    <td>{{ $t->name }}</td>
                                    <td>{{ $t->price }} $</td>
                                    <td>
                                        <a href="{{ route('admin#storeEditPage',$t->id) }}">
                                            <button class="mx-2 btn btn-danger rounded-circle">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('admin#storeDelete',$t->id) }}">
                                            <button class="mx-2 btn btn-danger rounded-circle">
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
                <div class="col-5">
                    <div class=" card mt-4 me-2">
                        <div class="rounded" >
                          <form action="{{ route('admin#storeCreate') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                              @csrf
                            <h2 class="text-center text-dark pt-1">Product Create</h2><br>
                              <div class="user-box mx-5 my-3">
                                <label class="text-dark">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="">
                                @error('name')
                                    <p class="text-danger">*{{ $message }}*</p>
                                @enderror
                              </div>                              <div class="user-box mx-5 my-3">
                                <label class="text-dark">Price</label>
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="">
                                @error('price')
                                    <p class="text-danger">*{{ $message }}*</p>
                                @enderror
                              </div>
                              <div class="user-box mx-5 my-3">
                                <label class="text-dark">Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="">
                                @error('image')
                                    <p class="text-danger">*{{ $message }}*</p>
                                @enderror
                              </div>

                              <!-- Submit button -->
                            <div class="submit-box my-3 text-center">
                                <button type="submit" class="btn btn-danger fw-bold w-25 mb-3">Create</button>
                               </div>


                          </form>
                        </div>
                      </div>
                </div>
            </div>
        </div>
@endsection
