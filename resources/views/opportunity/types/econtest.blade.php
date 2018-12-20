@extends('opportunity.edit')
@section('type')
<div class="form-group row">
    <label for="cspecialization" class="col-md-4 col-form-label text-md-right">{{ __('Specialization') }}</label>

    <div class="col-md-6">
        <input id="cspecialization" type="text" class="form-control{{ $errors->has('cspecialization') ? ' is-invalid' : '' }}" name="cspecialization" value="{{ $type['specialization'] }}" required autofocus>

        @if ($errors->has('cspecialization'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('cspecialization') }}</strong>
            </span>
        @endif
    </div>
</div>
<input hidden type="number" value="1" name="temp">
<div class="form-group row">
    <label for="prizes" class="col-md-4 col-form-label text-md-right">{{ __('Prizes') }}</label>
    <textarea name="prizes" class="form-control" rows="2" style="width: 46%; margin-left: 2%">{{$type['prizes']}}</textarea>
</div>
@endsection