@extends('layouts.app')

@section('title', 'Edit Appointment')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header"><h4 class="mb-0">Edit Appointment</h4></div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif
            <form action="{{ route('appointments.update', $appointment) }}" method="POST">
                @csrf
                @method('PUT')
                @include('appointments.form')
                <button class="btn btn-primary">Update Appointment</button>
                <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
