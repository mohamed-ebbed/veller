@extends("layouts.app")
<title>Veller | support_tickets</title>

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

                <div class="card-body">
                    <form method="POST" action="userController@store">
                        @csrf

                        <div class="form-group row">
                            <h2 class=""> if you have any problem please tell us </h2>
                            <label for="name" class="col-md-4 col-form-label text-md-right">Content</label>

                            <div class="col-md-6">
                                <textarea id="name" type="text" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" value="{{ old('content') }}" required autofocus></textarea>
                            </div>
                        </div>


                        <div class="form-group row mb-0  align-items-center justify-content-center">
                            <div class="col-md-6 offset-md-4" style="margin-bottom: 2%">
                                <button type="submit" class="btn btn-primary">
                                    Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ URL::asset('js/selectBoxes.js') }}"></script>
@endsection
