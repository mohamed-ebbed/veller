@extends('layouts.opporunitiesIndexLayout')

<title>Veller | Contests</title>

@section('contests_tab')
	active
@endsection

@section('postsArea')
	<div class="list-group">
		@if ($posts->num_rows != 0)
			<h5 style="color: #212529;">Number of contests: {{$posts->num_rows}}</h5>
			@while($post = $posts->fetch_assoc())
				<a href="{{route('contests.show', $post['id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
					<p>{{$post["name"]}}</p>
					<p>{{$post["title"]}}</p>
					<p>{{$post["expiration_date"]}}</p>
				</a>		
			@endwhile	
		@else
			<div class="jumbotron">
				<p>Sorry! There is no contests at the moment.</p>
			</div>
		@endif
	</div>
@endsection