@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Superhero</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('superheroes.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('superheroes.update',$superhero->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Real Name:</strong>
                <input type="text" name="real_name" value="{{ $superhero->real_name }}" class="form-control" placeholder="Real Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hero Name:</strong>
                <input type="text" name="hero_name" value="{{ $superhero->hero_name }}" class="form-control" placeholder="Hero Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Photo URL:</strong>
                <input type="text" name="photo_url" value="{{ $superhero->photo_url }}" class="form-control" placeholder="Photo URL">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Additional Info:</strong>
                <textarea class="form-control" style="height:150px" name="additional_info" placeholder="Additional Information">{{ $superhero->additional_info }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection