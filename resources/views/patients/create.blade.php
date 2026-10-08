@extends('layouts.app')

@section('title', 'Add Patient')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header"><h4 class="mb-0">Add Patient</h4></div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif

            <form action="{{ route('patients.store') }}" method="POST">
                @csrf
                @include('patients.form')
                <button class="btn btn-primary">Save Patient</button>
                <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
