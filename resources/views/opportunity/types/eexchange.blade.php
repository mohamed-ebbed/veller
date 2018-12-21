@extends('opportunity.edit')
@section('type')
<div class="form-group row">
    <label for="especialization" class="col-md-4 col-form-label text-md-right">{{ __('Specialization') }}</label>

    <div class="col-md-6">
        <input id="especialization" type="text" class="form-control{{ $errors->has('especialization') ? ' is-invalid' : '' }}" name="especialization" value="{{ $type['specialization'] }}" required autofocus>

        @if ($errors->has('especialization'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('especialization') }}</strong>
            </span>
        @endif
    </div>
</div>
<input hidden type="number" value="2" name="temp">
<div class="form-group row">
    <label for="countries" class="col-md-4 col-form-label text-md-right">{{ __('Countries') }}</label>
    <textarea name="countries" class="form-control" rows="2" style="width: 46%; margin-left: 2%">{{$type['country']}}</textarea>
</div>
@endsection