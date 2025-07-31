<x-layouts.app>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- En-tête -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0">Liste des Patients</h1>
                    <a href="{{ route('patients.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus me-2"></i>Nouveau Patient
                    </a>
                </div>

                <!-- Filtres et recherche -->
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="GET" action="{{ route('patients.index') }}" class="row g-3">
                            <div class="col-md-4">
                                <label for="search" class="form-label">Rechercher</label>
                                <input type="text" class="form-control" id="search" name="search"
                                    value="{{ request('search') }}" placeholder="Nom, email, téléphone...">
                            </div>

                            <div class="col-md-3">
                                <label for="region" class="form-label">Région</label>
                                <select class="form-select" id="region" name="region">
                                    <option value="">Toutes les régions</option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region }}"
                                            {{ request('region') == $region ? 'selected' : '' }}>
                                            {{ $region }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="status" class="form-label">Statut</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="">Tous</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>
                                        Actifs
                                    </option>
                                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>
                                        Inactifs
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-outline-primary me-2">
                                    <i class="bx bx-search"></i> Filtrer
                                </button>
                                <a href="{{ route('patients.index') }}" class="btn btn-outline-secondary">
                                    <i class="bx bx-x"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Messages de succès -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Tableau des patients -->
                <div class="card">
                    <div class="card-body">
                        @if ($patients->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Nom Complet</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Âge</th>
                                            <th>Région</th>
                                            <th>Groupe Sanguin</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patients as $patient)
                                            <tr class="text-center">
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-circle me-3">
                                                            {{ substr($patient->first_name, 0, 1) }}{{ substr($patient->last_name, 0, 1) }}
                                                        </div>
                                                        <div>
                                                            <strong>{{ $patient->full_name }}</strong>
                                                            <br>
                                                            <small class="text-muted">{{ $patient->gender }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="mailto:{{ $patient->email }}">{{ $patient->email }}</a>
                                                </td>
                                                <td>
                                                    <a href="tel:{{ $patient->phone }}">{{ $patient->phone }}</a>
                                                </td>
                                                <td>{{ $patient->age }} ans</td>
                                                <td>{{ $patient->region }}</td>
                                                <td>
                                                    @if ($patient->blood_type)
                                                        <span class="badge bg-info">{{ $patient->blood_type }}</span>
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($patient->is_active)
                                                        <span class="badge bg-success">Actif</span>
                                                    @else
                                                        <span class="badge bg-secondary">Inactif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('patients.show', $patient) }}"
                                                            class="btn btn-sm btn-outline-primary" title="Voir détails">
                                                            <i class="bx bx-show"></i>
                                                        </a>
                                                        <a href="{{ route('patients.edit', $patient) }}"
                                                            class="btn btn-sm btn-outline-warning" title="Modifier">
                                                            <i class="bx bx-edit"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                            title="Supprimer"
                                                            onclick="confirmDelete({{ $patient->id }})">
                                                            <i class="bx bx-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <div>
                                    Affichage de {{ $patients->firstItem() }} à {{ $patients->lastItem() }}
                                    sur {{ $patients->total() }} patients
                                </div>
                                {{ $patients->links() }}
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="bx bx-group bx-lg text-muted mb-3" style="font-size: 3rem;"></i>
                                <h5>Aucun patient trouvé</h5>
                                <p class="text-muted">
                                    @if (request()->hasAny(['search', 'region', 'status']))
                                        Essayez de modifier vos critères de recherche.
                                    @else
                                        Commencez par ajouter votre premier patient.
                                    @endif
                                </p>
                                <a href="{{ route('patients.create') }}" class="btn btn-primary">
                                    <i class="bx bx-plus me-2"></i>Ajouter un Patient
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation de suppression -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bx bx-error-circle text-danger me-2"></i>
                        Confirmer la suppression
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center">
                        <i class="bx bx-info-circle text-warning me-3" style="font-size: 1.5rem;"></i>
                        <div>
                            Êtes-vous sûr de vouloir supprimer ce patient ? Cette action peut être annulée.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x me-1"></i>Annuler
                    </button>
                    <form id="deleteForm" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bx bx-trash me-1"></i>Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .avatar-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(45deg, #007bff, #0056b3);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
        }

        /* Style pour les icônes Boxicons */
        .bx {
            font-size: 1rem;
        }

        .bx-lg {
            font-size: 1.5rem;
        }
    </style>

    <script>
        function confirmDelete(patientId) {
            const form = document.getElementById('deleteForm');
            form.action = `{{ route('patients.index') }}/${patientId}`;

            const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        }
    </script>
</x-layouts.app>
