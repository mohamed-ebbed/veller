@extends('layouts.opporunitiesIndexLayout')

<title>Veller | Internships</title>

@section('internships_tab')
	active
@endsection

@section('postsArea')
	<div class="list-group">
		@if ($posts->num_rows != 0)
			<h5 style="color: #212529;">Number of internships: {{$posts->num_rows}}</h5>
			@while($post = $posts->fetch_assoc())
				<a href="{{route('InternshipController.show', $post['id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
					<p>$post["name"]</p>
					<p>$post["title"]</p>
					<p>$post["expiration_date"]</p>
				</a>		
			@endwhile	
		@else
			<div class="jumbotron">
				<p>Sorry! There is no internships at the moment.</p>
			</div>
		@endif
	</div>
@endsection