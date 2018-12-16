@extends('layouts.opporunitiesIndexLayout')

<title>Veller | Opportunities</title>

@section('opportunities_tab')
	active
@endsection

@section('postsArea')
	<div class="list-group">
		@if ($posts->num_rows != 0)
			@while($post = $posts->fetch_assoc())
				@if($post["type"] == "Scholarship")
					<a href="{{route('scholarshipController.show', $post['id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>$post["name"]</p>
						<p>$post["title"]</p>
						<p>$post["expiration_date"]</p>
					</a>
				@elseif ($post["type"] == "Internship")
					<a href="{{route('InternshipController.show', $post['id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>$post["name"]</p>
						<p>$post["title"]</p>
						<p>$post["expiration_date"]</p>
					</a>
				@elseif ($post["type"] == "Volunteering")
					<a href="{{route('volunteeringController.show', $post['id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>$post["name"]</p>
						<p>$post["title"]</p>
						<p>$post["expiration_date"]</p>
					</a>
				@elseif ($post["type"] == "Exchange Program")
					<a href="{{route('exchangeController.show', $post['id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>$post["name"]</p>
						<p>$post["title"]</p>
						<p>$post["expiration_date"]</p>
					</a>
				@elseif ($post["type"] == "Contest")
					<a href="{{route('contestController.show', $post['id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
						<p>$post["name"]</p>
						<p>$post["title"]</p>
						<p>$post["expiration_date"]</p>
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