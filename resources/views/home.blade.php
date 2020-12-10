@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Covid Report') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="GET" action="{{ route('getlist') }}">
                    <div class="form-group row">
                        <label for="Phone" class="col-md-3 col-form-label text-md-right">{{ __('Phone number') }}</label>

                        <div class="col-md-4">
                            <input id="phone_number" type="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required  autofocus>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary" style="margin-top:10px">
                                {{ __('Search') }}
                            </button>

                        </div>
                    </div>
                  </form>
                    <div class="container">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(isset($list))
                          @foreach($list as $data)
                          <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->phone_number}}</td>
                            <td>{{$data->created_at}}</td>
                          </tr>
                          @endforeach
                          @endif
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
