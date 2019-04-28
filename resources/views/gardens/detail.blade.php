@extends('layouts.app')

@section('title', $garden->first()->name)

@section('content')
<div class="container">
	
	<h1>{{$garden->first()->name}}</h1>
	<h3>Address:</h3>
	<ul><li>{{$garden->first()->address}}</li></ul>

	<h3>Current crops:</h3>
	<h5>&nbsp&nbsp Ready to Harvest!</h5>
	<ul>
		@forelse($harvest_crops as $crop)
			
			<li>
				{{$crop->title}}: {{$crop->description}} -- {{$crop->status}} on {{$crop->date}}
				@if (Auth::check()) 
					<a href='/gardens/{{$garden->first()->garden_id}}/{{$crop->crop_id}}/update'>Update</a>
					<a href='/gardens/{{$garden->first()->garden_id}}/{{$crop->crop_id}}/delete'>Delete</a>
				@endif
			</li>
		@empty
			<li>No crops.</li>
		@endforelse
	</ul>
	<h5>&nbsp&nbsp Still Growing:</h5>
	<ul>
		@forelse($growing_crops as $crop)
			
			<li>
				{{$crop->title}}: {{$crop->description}} -- {{$crop->status}} as of {{$crop->date}}
				@if (Auth::check()) 
					<a href='/gardens/{{$garden->first()->garden_id}}/{{$crop->crop_id}}/update'>Update</a>
					<a href='/gardens/{{$garden->first()->garden_id}}/{{$crop->crop_id}}/delete'>Delete</a>
				@endif
			</li>
		@empty
			<li>No crops.</li>
		@endforelse
	</ul>
	<h5>&nbsp&nbsp Just Planted:</h5>

	<ul>
		@forelse($new_crops as $crop)
			
			<li>
				{{$crop->title}}: {{$crop->description}} -- {{$crop->status}} on {{$crop->date}}
				@if (Auth::check()) 
					<a href='/gardens/{{$garden->first()->garden_id}}/{{$crop->crop_id}}/update'>Update</a>
					<a href='/gardens/{{$garden->first()->garden_id}}/{{$crop->crop_id}}/delete'>Delete</a>
				@endif
			</li>
		@empty
			<li>No crops.</li>
		@endforelse
	</ul>

	@if (Auth::check()) 
		<a href="/gardens/{{$garden->first()->garden_id}}/create">Add a new crop</a>
	@endif
	
</div>
@endsection