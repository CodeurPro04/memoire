<x-layouts.app>
<div class="container mt-5">
  <div class="card shadow-sm border-0">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Liste des Médecins</h5>
      <a href="{{ route('doctors.create') }}" class="btn btn-primary btn-sm">
        <i class="bx bx-plus me-1"></i> Ajouter
      </a>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover table-bordered mb-0">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>Nom</th>
              <th>Spécialité</th>
              <th>Établissement</th>
              <th>Email</th>
              <th>Téléphone</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($doctors as $index => $doctor)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $doctor->first_name }} {{ $doctor->last_name }}</td>
                <td>{{ $doctor->specialty->name ?? '—' }}</td>
                <td>{{ $doctor->establishment->name ?? '—' }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->phone ?? '—' }}</td>
                <td>
                  <a href="{{ route('doctors.show', $doctor) }}" class="btn btn-sm btn-info">
                    <i class="bx bx-show"></i>
                  </a>
                  <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-sm btn-warning">
                    <i class="bx bx-edit"></i>
                  </a>
                  <form action="{{ route('doctors.destroy', $doctor) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">
                      <i class="bx bx-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
            @if ($doctors->isEmpty())
              <tr>
                <td colspan="7" class="text-center text-muted">Aucun médecin trouvé.</td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


</x-layouts.app>