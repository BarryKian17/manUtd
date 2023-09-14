@extends('Admin.layouts.master')

@section('title','category create')

@section('content')

        <div class="mt-4 mx-5 col-1 ">
            <a href="{{ route('admin#home') }}">
                <button class="btn btn-danger w-100">
                    <i class="fa-solid fa-arrow-left me-2"></i>Back
                </button>
            </a>
        </div>
            <div class="col-4 offset-4 mt-5">
                <div class="card w-100">
                    <div class="card-body">
                        <h4 class="text-center">Create Category</h4>
                        <form action="{{ route('admin#categoryEdit') }}" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="form-group">
                                <label  class="control-label mb-1">Name</label>
                                <input type="text" name="categoryId" hidden value="{{ $category->id }}">
                                <input  name="categoryName" type="text" value="{{ old('categoryName',$category->name)  }}" class="form-control @error('categoryName') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Category Name...">
                                @error('categoryName')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <button class="btn btn-danger w-100 my-2">
                                Create Category<i class="fa-solid fa-circle-arrow-right ms-2"></i>
                            </button>
                        </form>
                    </div>
                  </div>
            </div>
        </div>

@endsection
