@extends('layouts.app')

@section('title', 'Edit Patient')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header"><h4 class="mb-0">Edit Patient</h4></div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif

            <form action="{{ route('patients.update', $patient) }}" method="POST">
                @csrf
                @method('PUT')
                @include('patients.form')
                <button class="btn btn-primary">Update Patient</button>
                <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
