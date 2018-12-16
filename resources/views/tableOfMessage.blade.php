@extends('layouts.app')
@section('content')
       
  	      <div class="container">
  	      	<div class="dropdown" style="margin:50px">
			    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select your messages
			    <span class="caret"></span></button>
			    <ul class="dropdown-menu">
			      <li><a href="#">send messages</a></li>
			      <li><a href="#">recieve messages</a></li>
			    </ul>
			  </div>		
	        <h1 class="text-uppercase" style="margin:80px"> Recieving messages </h1>      
	 	    <table class="table">
	 	    	<tr class="table-dark">
	 	    		<th>Email</th>
	 	    		<th>Content</th>
	 	    		<th>Sent at</th>
	 	    	</tr>
	 	    	<tbody>
	        @if($message)
				  @while($row = $message->fetch_assoc())
                      <tr class="table-success">
				        <td>{{$row["email"]}}</td>
				        <td>{{$row["content"]}}</td>
				        <td>{{$row["sent_at"]}}</td>
				      </tr>
				  @endwhile
		    @else
		        <tr class="table-success">
			        <td>Empty</td>
			        <td>Empty</td>
			        <td>Empty</td>
			    </tr>
			@endif
				</tbody>
		    </table>
@endsection