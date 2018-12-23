@extends('layouts.app')
@section('messageStyle')
	@include('inc.messagestyle')
@endsection
@section('messageScript')
	@include('inc.messagescript')
@endsection
@section('mainstyle')
	@include('inc.mainstyle')
@endsection

@section('content')
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<section class="hero-section spad">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-10 offset-xl-1">
					<div class="row">
						<div class="col-lg-6">
							<div class="hero-text">
								<h2>{{$sup["name"]}}</h2>
							</div>
							<div class="hero-info">
								<h2>General Info</h2>
								<ul>
									<li><span>Address</span>{{$user["zip"]}},{{$user["city"]}},{{$user["country"]}}</li>
									<li><span>E-mail</span>{{$user["email"]}}</li>
									<li><span>Phone </span>{{$user["phone_number"]}}</li>
									<li><span>Solved issues Number </span>{{$user["support_ticket_count"]}}</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="container">
	        <h1 class="masthead mb-auto" style="margin:70px;"> Users </h1>      
	 	    <table class="table" style="font-family: "indie Flower","Courier New", Courier, monospace;">
	 	    	<tr class="text table-light">
	 	    		<th>Name</th>
	 	    		<th>Email</th>
	 	    		<th>Delete</th>
	 	    	</tr>
	 	    	<tbody>
	        @if($users->num_rows)
				  @while($row = $users->fetch_assoc())
                      <tr style='background-color: red'>
				        <td>{{$row["name"]}}</td>
				        <td>{{$row["email"]}}</td>
				        <td>
    	                    <form method="POST" action="{{route('users.destroy',$row['id'])}}">
    	                    	<div class="form-group row mb-0  align-items-center justify-content-center">
		                            <div class="col-md-6 offset-md-4" style="margin-bottom: 2%">
		                                <button type="submit" class="btn btn-danger">
		                                    {{ __('Delete') }}
		                                </button>
		                            </div>
		                        </div>
    	                    </form>

				        </td>
				      </tr>
				  @endwhile
		    @else
		        <tr class="table-light">
			        <td>Empty</td>
			        <td>there is no Users</td>
			        <td>Empty</td>
			    </tr>
			@endif
				</tbody>
		    </table>


		    <h1 class="masthead mb-auto" style="margin:70px;"> Support Tickets </h1>      
	 	    <table class="table" id="send_messages">
	 	    	<tr class="table-light">
	 	    		<th>Email</th>
	 	    		<th>Content</th>
	 	    		<th>Sent at</th>
	 	    	</tr>
	 	    	<tbody>
	        @if($Smessage->num_rows)
				  @while($row = $Smessage->fetch_assoc())
                      <tr class="table-light">
				        <td>{{$row["email"]}}</td>
				        <td>{{$row["content"]}}</td>
				        <td>{{$row["sent_at"]}}</td>
				      </tr>
				  @endwhile
		    @else
		        <tr class="table-light">
			        <td>Empty</td>
			        <td>there is no messages</td>
			        <td>Empty</td>
			    </tr>
			@endif
				</tbody>
		    </table>
		</div>
@endsection	


	
