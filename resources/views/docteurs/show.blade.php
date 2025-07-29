@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold">{{ $doctor->full_name }}</h1>
    <p><strong>Email :</strong> {{ $doctor->email }}</p>
    <p><strong>Téléphone :</strong> {{ $doctor->phone }}</p>
    <p><strong>Spécialité :</strong> {{ optional($doctor->specialty)->name }}</p>
    <p><strong>Expérience :</strong> {{ $doctor->years_of_experience }} ans</p>
    <p><strong>Bio :</strong> {{ $doctor->bio }}</p>

    <a href="{{ route('doctors.edit', $doctor) }}" class="text-blue-600">Modifier</a>
</div>
@endsection
