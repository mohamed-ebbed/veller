@extends('layouts.opporunitiesIndexLayout')

<title>Veller | Opportunities</title>

@section('opportunities_tab')
	active
@endsection

@section('mainstyle')
  @include('inc.mainstyle')
@endsection
@section('mainscript')
  @include('inc.mainscript')
@endsection

@section('postsArea')
	<div class="list-group">
		@if ($posts->num_rows != 0)
			<h5 style="color: #212529;">Number of opportunities: {{$posts->num_rows}}</h5>
			@while($post = $posts->fetch_assoc())
				@if($post["type"] == "Scholarship")
					<a href="{{route('scholarship.show', $post['id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>{{$post["name"]}}</p>
						<p>{{$post["title"]}}</p>
						<p>{{$post["expiration_date"]}}</p>
					</a>
				@elseif ($post["type"] == "Internship")
					<a href="{{route('internship.show', $post['id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>{{$post["name"]}}</p>
						<p>{{$post["title"]}}</p>
						<p>{{$post["expiration_date"]}}</p>
					</a>
				@elseif ($post["type"] == "Volunteering")
					<a href="{{route('volunteering.show', $post['id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>{{$post["name"]}}</p>
						<p>{{$post["title"]}}</p>
						<p>{{$post["expiration_date"]}}</p>
					</a>
				@elseif ($post["type"] == "Exchange Program")
					<a href="{{route('exchange_programs.show', $post['id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>{{$post["name"]}}</p>
						<p>{{$post["title"]}}</p>
						<p>{{$post["expiration_date"]}}</p>
					</a>
				@elseif ($post["type"] == "Contest")
					<a href="{{route('contests.show', $post['id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>{{$post["name"]}}</p>
						<p>{{$post["title"]}}</p>
						<p>{{$post["expiration_date"]}}</p>
					</a>
				@endif		
			@endwhile	
		@else
			<div class="jumbotron">
				<p>Sorry! There is no opportunities at the moment.</p>
			</div>
		@endif
	</div>
@endsection