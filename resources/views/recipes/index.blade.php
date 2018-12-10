@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recipe List</div>

                <div class="card-body">
                    <ul>
                    @foreach ($recipes as $recipe)
                        <li><a href="{{ route('recipe.show', $recipe) }}">{{ $recipe->name }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
