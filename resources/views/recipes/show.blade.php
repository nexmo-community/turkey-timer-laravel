@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $recipe->name }}</div>

                <div class="card-body">
                    This is a recipe by {{ $recipe->user->email }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

