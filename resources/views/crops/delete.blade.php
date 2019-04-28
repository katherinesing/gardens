@extends('layouts.app')

@section('title', 'Delete' . $crop->first()->title . ' from ' . $garden->first()->name)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Delete {{ $crop->first()->title }} from {{$garden->first()->name}}</div>

                <div class="card-body">
                    <form method="post" action="/gardens/{{$garden->first()->garden_id}}/{{$crop->first()->crop_id}}/delete">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                            <h3>Are you sure you want to DELETE {{ $crop->first()->title }} from {{$garden->first()->name}}?</h3>
                            <p>{{ $crop->first()->title }}: {{ $crop->first()->description }} -- {{ $crop->first()->status }} as of {{ $crop->first()->date }} at {{$garden->first()->name}}</p>
                            
                                <input type="hidden" id="crop_id" name="crop_id" value="{{ $crop->first()->crop_id }}">  
                            </div>
                            <div class="col-md-2"></div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="/gardens/{{$garden->first()->garden_id}}" class="btn btn-secondary">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection