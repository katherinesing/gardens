@extends('layouts.app')

@section('title', 'Update '. $crop->first()->title . ' from ' . $garden->first()->name)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update {{ $crop->first()->title }} from {{$garden->first()->name}}</div>

                <div class="card-body">
                    <form method="POST" action="/gardens/{{$garden->first()->garden_id}}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Crop Name</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="title" value="{{ $crop->first()->title }}" required autocomplete="title" autofocus>
                                <input type="hidden" id="crop_id" name="crop_id" value="{{ $crop->first()->crop_id }}">  
                                <small class="text-danger">{{$errors->first('title')}}</small>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="garden" class="col-md-4 col-form-label text-md-right">Garden</label>

                            <div class="col-md-6">
                                <input id="garden" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="garden" value="{{$garden->first()->name}}" readonly>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                            <div class="col-md-6">
                                <input type="radio" id="status" name="status" value="Still Growing" checked="checked"> Still Growing<br>
                                <input type="radio" id="status" name="status" value="Ready to Harvest"> Ready to Harvest<br>
                                
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" name="description" value="{{ $crop->first()->description }}" required autocomplete="description" autofocus>
                                <small class="text-danger">{{$errors->first('description')}}</small>
                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="/gardens/{{$garden->first()->garden_id}}" class="btn btn-secondary">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>

                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection