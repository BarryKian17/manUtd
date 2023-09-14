@extends('Admin.layouts.master')

@section('title','Team List')

@section('content')

        <h3 class="text-center mt-2">Fixture</h3>

        <div class="row">
            <div class="d-flex">
                <div class="col-8">
                    <div class="table-responsive table-responsive-data2 col-10 offset-1 mt-5">
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr>

                                    <th class="col-3">Home Team</th>
                                    <th class="col-2">Date</th>
                                    <th class="col-3" >Away Team</th>
                                    <th class="col-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fixture as $t)
                                <tr>
                                    <td>{{ $t->home_team }}</td>
                                    <td >{{ \Carbon\Carbon::parse($t->date)->format('d-m-Y')  }}</td>
                                    <td class="">{{ $t->away_team }}</td>
                                    <td>
                                        <a href="{{ route('admin#resultCreatePage',$t->id) }}">
                                            <button class="mx-2 btn btn-danger rounded-circle">
                                                <i class="fa-solid fa-right-left"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('admin#fixtureEditPage',$t->id) }}">
                                            <button class="mx-2 btn btn-danger rounded-circle">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('admin#fixtureDelete',$t->id) }}">
                                            <button class="mx-2 btn btn-danger rounded-circle">
                                                <i class="fa-sharp fa-solid fa-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $fixture->links() }}
                    </div>
                </div>
                <div class="col-4">
                    <div class=" card mt-4 me-2">
                        <div class="rounded" >
                          <form action="{{ route('admin#fixtureCreate') }}" method="POST" novalidate="novalidate" >
                              @csrf
                            <h2 class="text-center text-dark pt-1">Fixture Create</h2><br>
                            <div class="user-box mx-5 my-3">
                                <label class="text-dark">Home Team</label>
                                <select name="homeTeam" class="form-control @error('homeTeam') is-invalid @enderror" id="">
                                        <option value="">Choose Home Team</option>
                                    @foreach ($team as $t)
                                        <option value="{{ $t->name }}">{{ $t->name }}</option>
                                    @endforeach
                                </select>
                                @error('homeTeam')
                                    <p class="text-danger">*{{ $message }}*</p>
                                @enderror
                              </div>
                            <div class="user-box mx-5 my-3">
                                <label class="text-dark">Away Team</label>
                                <select name="awayTeam" class="form-control @error('awayTeam') is-invalid @enderror" id="">
                                    <option value="">Choose Away Team</option>
                                    @foreach ($team as $t)
                                        <option value="{{ $t->name }}">{{ $t->name }}</option>
                                    @endforeach
                                </select>
                                @error('awayTeam')
                                    <p class="text-danger">*{{ $message }}*</p>
                                @enderror
                              </div>
                              <div class="user-box mx-5 my-3">
                                <label class="text-dark">Date</label>
                                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" id="">
                                @error('date')
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
