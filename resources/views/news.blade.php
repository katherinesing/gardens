@extends('layouts.app')

@section('title', 'Crops Ready to Harvest')

@section('content')
<div class="container">
	
	<h1>Crops Ready to Harvest</h1>
	<p>Note: Community gardens provide fresh, organic fruits and vegetables to the entire community for free in efforts to alleviate hunger and make our community healthier. Please take only crops that you will eat, and leave crops for everyone to enjoy!</p> 
	<ul>
		@forelse($harvest_crops as $crop)
			<li>
				{{$crop->title}} at <a href="/gardens/{{$crop->garden_id}}">{{$crop->name}}</a> since {{$crop->date}}
			</li>
		@empty
			<li>No crops.</li>
		@endforelse
	</ul>


</div>
@endsection