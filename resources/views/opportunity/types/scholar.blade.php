@extends('opportunity.create')
@section('type')
<div class="form-group row">
    <label for="stype" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
    <div class="col-md-6">
        <select name="stype" class="form-control">
            <option>Bachelor</option>
            <option>Master</option>
            <option>PHD</option>
        </select>
        @if ($errors->has('stype'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('stype') }}</strong>
            </span>
        @endif
    </div>
</div>
<input hidden type="number" value="4" name="temp">
<div class="form-group row">
    <label for="spaid" class="col-md-4 col-form-label text-md-right">{{ __('Paid?!') }}</label>

    <div class="col-md-6">
        <select name="spaid" class="form-control">
            <option>yes</option>
            <option>no</option>
        </select>
        @if ($errors->has('spaid'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('spaid') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="sspecialization" class="col-md-4 col-form-label text-md-right">{{ __('Specialization') }}</label>

    <div class="col-md-6">
        <input id="sspecialization" type="text" class="form-control{{ $errors->has('sspecialization') ? ' is-invalid' : '' }}" name="sspecialization" value="{{ old('sspecialization') }}" required autofocus>

        @if ($errors->has('sspecialization'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('sspecialization') }}</strong>
            </span>
        @endif
    </div>
</div>
@endsection