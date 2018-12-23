@extends('layouts.opporunitiesIndexLayout')

<title>Veller | Volunteering</title>

@section('volunteering_tab')
	active
@endsection

@section('postsArea')
	<div class="list-group">
		@if ($posts->num_rows != 0)
			@while($post = $posts->fetch_assoc())
				<a href="{{route('volunteering.show', $post['id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
					<p>{{$post["name"]}}</p>
					<p>{{$post["title"]}}</p>
					<p>{{$post["post_date"] }}</p>
				</a>		
			@endwhile	
		@else
			<div class="jumbotron">
				<p>Sorry! There is no volunteering at the moment.</p>
			</div>
		@endif
	</div>
@endsection