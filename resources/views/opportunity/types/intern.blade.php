@extends('opportunity.create')
@section('type')
<div class="form-group row">
    <label for="ispecialization" class="col-md-4 col-form-label text-md-right">{{ __('Specialization') }}</label>

    <div class="col-md-6">
        <input id="ispecialization" type="text" class="form-control{{ $errors->has('ispecialization') ? ' is-invalid' : '' }}" name="ispecialization" value="{{ old('ispecialization') }}" required autofocus>

        @if ($errors->has('ispecialization'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('ispecialization') }}</strong>
            </span>
        @endif
    </div>
</div>
<input hidden type="number" value="3" name="temp">
<div class="form-group row">
    <label for="ipaid" class="col-md-4 col-form-label text-md-right">{{ __('Paid?!') }}</label>

    <div class="col-md-6">
        <select name="ipaid" class="form-control">
            <option>yes</option>
            <option>no</option>
        </select>
        @if ($errors->has('ipaid'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('ipaid') }}</strong>
            </span>
        @endif
    </div>
</div>
@endsection