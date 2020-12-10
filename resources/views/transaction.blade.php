@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Transaction Logged in as') }} <h5> Monisha</h5></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('transaction') }}">
                        @csrf
                        @if(!isset($shopmaster))
                        <div class="form-group row">
                            <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Shop id') }}</label>

                            <div class="col-md-6">
                                <input id="shop_id" type="shop_id" class="form-control @error('shop_id') is-invalid @enderror" name="shop_id" value="{{ old('shop_id') }}" required  autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Search') }}
                                </button>

                            </div>
                        </div>


                    <hr>
                    @endif
                          @if(isset($shopmaster))
                          @foreach($shopmaster as $shop)

                        <div class="form-group row mb-0">
                        <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Shop Name') }}:</label>
                        <label for="Name" class="col-md-4 col-form-label text-md-left"><h4>{{ $shop->shop_name }}</h4></label>
                      </div>
                      <div class="form-group row mb-0">
                        <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}:</label>
                        <label for="Name" class="col-md-4 col-form-label text-md-left"><h4>{{ $shop->name }}</h4></label>
                          </div>
                          <div class="form-group row mb-0">
                            <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Shop Id') }}:</label>
                            <label for="Name" class="col-md-4 col-form-label text-md-left"><h4>{{ $shop->id }}</h4></label>
                            <input type="hidden" name="hidden_guest" name="hidden_guest" value="1">
                            <input type="hidden" name="hidden_shop" name="hidden_shop" value="{{$shop->id}}">

                              </div>
                              <div class="form-group row mb-0">
                                  <div class="col-md-8 offset-md-4">
                                      <button type="submit" class="btn btn-primary">
                                          {{ __('Save') }}
                                      </button>

                                  </div>
                              </div>

                          @endforeach
                          @endif
                          </form>
                </div>
                  @if($errors->any())
                <div class="alert alert-success" role="alert">
                  Saved Successfully!
                </div>
                @endif


            </div>
        </div>
    </div>
</div>
@endsection
