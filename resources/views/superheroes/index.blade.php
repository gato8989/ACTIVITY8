@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Superheroes List</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('superheroes.create') }}"> Create New Superhero</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Hero Name</th>
        <th>Real Name</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($superheroes as $key => $superhero)
    @if(!$superhero->trashed())
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $superhero->hero_name }}</td>
        <td><img src="{{ $superhero->photo_url }}" width="50"></td>
        <!-- Rest of the row -->
    </tr>
    @endif
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $superhero->hero_name }}</td>
        <td>{{ $superhero->real_name }}</td>
        <td>
            <form action="{{ route('superheroes.destroy',$superhero->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('superheroes.show',$superhero->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('superheroes.edit',$superhero->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection