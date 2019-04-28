@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="container">
	
	<h1>Contact</h1>
	<p>For questions on how to volunteer at a garden or donate to our cause, please contact one of our volunteer coordinators/farmers.</p> 
	<ul>
		@forelse($coordinators as $coord)
			<li>
				{{$coord->name}} -- <a href = "mailto: {{$coord->email}}">{{$coord->email}}</a> (Garden: {{$coord->garden}})
			</li>
		@empty
			<li>None listed.</li>
		@endforelse
	</ul>
	<p>Thank you for making our community a better place!</p>

	<h5>A big thank you to all our other volunteers!</h5>
	<ul>
		@forelse($volunteers as $volunteer)
			<li>
				{{$volunteer->name}}
			</li>
		@empty
			<li>None listed.</li>
		@endforelse
	</ul>
	


</div>
@endsection