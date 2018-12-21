@extends('opportunity.edit')
@section('type')
<input hidden type="number" value="5" name="temp">
<div class="form-group row">
	<label for="pexp" class="col-md-4 col-form-label text-md-right">{{ __('Previous Experience') }}</label>
	<textarea name="pexp" class="form-control" rows="2" style="width: 46%; margin-left: 2%">{{$type['previous_experience']}}</textarea>
</div>
@endsection