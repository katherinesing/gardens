@extends('layouts.app')

@section('title', 'Gardens')

@section('content')
<div class="container">
	<h1>Community Gardens</h1>
	<ul>
		@forelse($gardens as $garden)
			<li>
				<a href="/gardens/{{$garden->garden_id}}">{{$garden->name}}</a>
			</li>
		@empty
			<li>No Gardens.</li>
		@endforelse
	</ul>
	@if (Auth::check()) 
		<a href="/gardens/create">Add a new garden</a>
	@endif

</div>
      
@endsection