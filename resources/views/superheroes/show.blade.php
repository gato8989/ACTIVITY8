@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Superhero</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('superheroes.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Real Name:</strong>
            {{ $superhero->real_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Hero Name:</strong>
            {{ $superhero->hero_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Photo:</strong><br>
            <img src="{{ $superhero->photo_url }}" alt="{{ $superhero->hero_name }}" width="200">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Additional Info:</strong>
            {{ $superhero->additional_info }}
        </div>
    </div>
</div>
@endsection