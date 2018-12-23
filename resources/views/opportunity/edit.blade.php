@extends('layouts.app')
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
    <h1 style="color:white;">Edit Opportunity</h1>
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <div class="card border border-warning shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <form method="POST" action="{{route('opportunity.update')}}">
                        @method('put')
                        @csrf
                        <input hidden name="user_id" type="number" value="3">
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $op['title'] }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                            <textarea name="description" class="form-control" rows="4" style="width: 46%; margin-left: 2%">{{$op['description']}}</textarea>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ $op['country'] }}" required>

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
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $op['city'] }}" required>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Duration') }}</label>

                            <div class="col-md-6">
                                <input id="duration" type="text" class="form-control{{ $errors->has('duration') ? ' is-invalid' : '' }}" name="duration" value="{{ $op['duration'] }}" required autofocus>

                                @if ($errors->has('duration'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="funded" class="col-md-4 col-form-label text-md-right">{{ __('Funded?!') }}</label>

                            <div class="col-md-6">
                                <select name="funded" class="form-control" value="$op['funded']">
                                    <option>yes</option>
                                    <option>no</option>
                                </select>
                                @if ($errors->has('funded'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('funded') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="int" class="col-md-4 col-form-label text-md-right">{{ __('Requirements') }}</label>
                            <textarea name="requirements" class="form-control" rows="2" style="width: 46%; margin-left: 2%">{{$op['requirements']}}</textarea>
                        </div>
                        <div class="form-group row">
                            <label for="tags" class="col-md-4 col-form-label text-md-right">{{ __('Tags') }}</label>
                            <textarea name="tags" class="form-control" rows="2" style="width: 46%; margin-left: 2%"></textarea>
                        </div>
                        @yield('type')
                        <div class="form-group row mb-0  align-items-center justify-content-center">
                            <div class="col-md-6 offset-md-4" style="margin-bottom: 2%">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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
