@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Ajouter un médecin</h1>

    <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('doctors.partials.form', ['doctor' => new \App\Models\Doctor])
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Enregistrer</button>
    </form>
</div>
@endsection
