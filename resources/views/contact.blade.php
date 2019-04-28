@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="container">
	
	<h1>Contact</h1>
	<p>For questions on how to volunteer at a garden or donate to our cause, please contact one of our volunteer coordinators/farmers.</p>
	<ul>
		@forelse($coordinators as $coord)
			<li>
				{{$coord->name}} -- <a href = "mailto: {{$coord->email}}">{{$coord->email}}</a>
			</li>
		@empty
			<li>None listed.</li>
		@endforelse
	</ul>
	<p>Thank you for making our community a better place!</p>


</div>
@endsection