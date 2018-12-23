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
			@while($post = $posts->fetch_assoc())
				@if($post["type"] == "scholarship")
					<a href="{{route('scholarship.show', $post['post_id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>{{$post["name"]}}</p>
						<p>{{$post["title"]}}</p>
						<p>{{ $post["post_date"] }}</p>
					</a>
				@elseif ($post["type"] == "internship")
					<a href="{{route('internship.show', $post['post_id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>{{$post["name"]}}</p>
						<p>{{$post["title"]}}</p>
						<p>{{ $post["post_date"] }}</p>
					</a>
				@elseif ($post["type"] == "volunteering")
					<a href="{{route('volunteering.show', $post['post_id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>{{$post["name"]}}</p>
						<p>{{$post["title"]}}</p>
						<p>{{ $post["post_date"]  }}</p>
					</a>
				@elseif ($post["type"] == "exchange")
					<a href="{{route('exchange_programs.show', $post['post_id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>{{$post["name"]}}</p>
						<p>{{$post["title"]}}</p>
						<p>{{ $post["post_date"]  }}</p>
					</a>
				@elseif ($post["type"] == "contest")
					<a href="{{route('contests.show', $post['post_id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>{{$post["name"]}}</p>
						<p>{{$post["title"]}}</p>
						<p>{{$post["post_date"]}}</p>
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