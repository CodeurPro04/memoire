@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Modifier le médecin</h1>

    <form action="{{ route('doctors.update', $doctor) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('doctors.partials.form', ['doctor' => $doctor])
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
    </form>
</div>
@endsection
