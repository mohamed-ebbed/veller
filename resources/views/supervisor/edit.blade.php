@extends('layouts.app')

<title>Edit | Supervisor</title>

@section('mainstyle')
    @include('inc.mainstyle')
@endsection
@section('mainscript')
    @include('inc.mainscript')
@endsection

@section('back')
  style="background-image:url('{{ URL::asset('Ayat_web/img/header.jpg') }}'); background-size:cover;"
@endsection
@section('content')
<div class="container" style="margin-top:5%">
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <div class="card border border-warning shadow p-3 mb-5 bg-white rounded">
                @include('inc.messages')
                <div class="card-body">
                    <form method="POST" action="{{route('supervisors.update',$sup['id'])}}">
                        @method('put')
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $sup['name'] }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $sup['email'] }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="Number" type="number" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ $sup['phone_number'] }}" required autofocus>

                                @if ($errors->has('number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ $sup['country'] }}" required autofocus>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $sup['city'] }}" required autofocus>

                                @if ($errors->has('City'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('City') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="zip" class="col-md-4 col-form-label text-md-right">{{ __('ZIP') }}</label>

                            <div class="col-md-6">
                                <input id="zip" type="number" class="form-control{{ $errors->has('zip') ? ' is-invalid' : '' }}" name="zip" value="{{ $sup['zip'] }}" required autofocus>

                                @if ($errors->has('zip'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0  align-items-center justify-content-center">
                            <div class="col-md-6 offset-md-4" style="margin-bottom: 2%">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
