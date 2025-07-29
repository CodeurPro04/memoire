<x-layouts.app>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Patient - Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 25px 30px;
            margin-bottom: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .welcome-section h1 {
            color: #2d3748;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .welcome-section p {
            color: #718096;
            font-size: 16px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 25px;
            margin-bottom: 30px;
        }

        .main-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #2d3748;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 5px;
        }

        .stat-label {
            color: #718096;
            font-size: 14px;
        }

        .appointments-card {
            grid-column: span 2;
        }

        .appointment-item {
            display: flex;
            align-items: center;
            padding: 15px;
            background: #f7fafc;
            border-radius: 12px;
            margin-bottom: 10px;
            border-left: 4px solid #667eea;
        }

        .appointment-item:last-child {
            margin-bottom: 0;
        }

        .appointment-date {
            background: #667eea;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 600;
            margin-right: 15px;
            min-width: 80px;
            text-align: center;
        }

        .appointment-details h4 {
            color: #2d3748;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .appointment-details p {
            color: #718096;
            font-size: 14px;
        }

        .alert-item {
            display: flex;
            align-items: center;
            padding: 12px;
            background: #fed7d7;
            border: 1px solid #fc8181;
            border-radius: 12px;
            margin-bottom: 10px;
        }

        .alert-item.info {
            background: #bee3f8;
            border-color: #63b3ed;
        }

        .alert-icon {
            margin-right: 12px;
            color: #e53e3e;
        }

        .alert-item.info .alert-icon {
            color: #3182ce;
        }

        .message-item {
            display: flex;
            align-items: center;
            padding: 15px;
            background: #f7fafc;
            border-radius: 12px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .message-item:hover {
            background: #edf2f7;
        }

        .message-item.unread {
            background: #e6fffa;
            border-left: 4px solid #38b2ac;
        }

        .message-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #667eea;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 12px;
        }

        .message-content h4 {
            color: #2d3748;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .message-content p {
            color: #718096;
            font-size: 14px;
        }

        .btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            margin-top: 15px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: #edf2f7;
            color: #4a5568;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .quick-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 20px;
        }

        .personal-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 15px;
        }

        .info-item {
            background: #f7fafc;
            padding: 15px;
            border-radius: 12px;
            border-left: 4px solid #667eea;
        }

        .info-label {
            color: #718096;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .info-value {
            color: #2d3748;
            font-weight: 600;
        }

        /* Couleurs pour les icônes */
        .icon-appointments {
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .icon-alerts {
            background: linear-gradient(135deg, #f093fb, #f5576c);
        }

        .icon-results {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
        }

        .icon-messages {
            background: linear-gradient(135deg, #43e97b, #38f9d7);
        }

        .icon-profile {
            background: linear-gradient(135deg, #fa709a, #fee140);
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .dashboard-grid {
                grid-template-columns: 1fr 1fr;
            }

            .main-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .appointments-card {
                grid-column: span 1;
            }

            .personal-info-grid {
                grid-template-columns: 1fr;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }
        }

        .loading {
            text-align: center;
            color: #718096;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header avec informations utilisateur -->
        <div class="header">
            <div class="welcome-section">
                <h1>Bienvenue, <span id="patientName">Jean Dupont</span></h1>
            </div>
        </div>

        <!-- Statistiques rapides -->
        <div class="dashboard-grid">
            <div class="card">
                <div class="card-header">
                    <div class="card-icon icon-appointments">
                        <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                            <path
                                d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z" />
                        </svg>
                    </div>
                    <div class="card-title">Rendez-vous</div>
                </div>
                <div class="stat-number" id="appointmentsCount">3</div>
                <div class="stat-label">Prochains RDV</div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-icon icon-results">
                        <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                            <path
                                d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                        </svg>
                    </div>
                    <div class="card-title">Résultats</div>
                </div>
                <div class="stat-number" id="resultsCount">5</div>
                <div class="stat-label">Nouveaux résultats</div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-icon icon-messages">
                        <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                            <path d="M20,2H4A2,2 0 0,0 2,4V22L6,18H20A2,2 0 0,0 22,16V4A2,2 0 0,0 20,2Z" />
                        </svg>
                    </div>
                    <div class="card-title">Messages</div>
                </div>
                <div class="stat-number" id="messagesCount">2</div>
                <div class="stat-label">Non lus</div>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="main-grid">
            <div>
                <!-- Prochains Rendez-vous -->
                <div class="card appointments-card">
                    <div class="card-header">
                        <div class="card-icon icon-appointments">
                            <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                <path
                                    d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z" />
                            </svg>
                        </div>
                        <div class="card-title">Prochains Rendez-vous</div>
                    </div>
                    <div id="appointmentsList">
                        <div class="appointment-item">
                            <div class="appointment-date">28<br>JUIL</div>
                            <div class="appointment-details">
                                <h4>Dr. Martin - Consultation générale</h4>
                                <p>10:00 - Cabinet médical Centre-ville</p>
                            </div>
                        </div>
                        <div class="appointment-item">
                            <div class="appointment-date">05<br>AOÛT</div>
                            <div class="appointment-details">
                                <h4>Dr. Dubois - Suivi spécialisé</h4>
                                <p>14:30 - Clinique Saint-Pierre</p>
                            </div>
                        </div>
                    </div>
                    <div class="quick-actions">
                        <a href="{{ route('rdv') }}" class="btn">Prendre RDV</a>
                        <a href="#" class="btn btn-secondary">Voir tout</a>
                    </div>
                </div>

                <!-- Résultats Médicaux -->
                <div class="card" style="margin-top: 25px;">
                    <div class="card-header">
                        <div class="card-icon icon-results">
                            <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                <path
                                    d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                            </svg>
                        </div>
                        <div class="card-title">Résultats Médicaux Récents</div>
                    </div>
                    <div id="resultsList">
                        <div class="message-item unread">
                            <div class="message-avatar">📊</div>
                            <div class="message-content">
                                <h4>Analyse sanguine complète</h4>
                                <p>25/07/2025 - Dr. Martin - Résultats disponibles</p>
                            </div>
                        </div>
                        <div class="message-item">
                            <div class="message-avatar">🩻</div>
                            <div class="message-content">
                                <h4>Radiographie thoracique</h4>
                                <p>20/07/2025 - Dr. Dubois - Normal</p>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-secondary">Voir tous les résultats</a>
                </div>
            </div>

            <div>
                <!-- Alertes et Rappels -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-icon icon-alerts">
                            <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                <path
                                    d="M12,2A2,2 0 0,1 14,4C14,4.74 13.6,5.39 13,5.73V7A7,7 0 0,1 20,14V16A1,1 0 0,0 21,17H22V19H2V17H3A1,1 0 0,0 4,16V14A7,7 0 0,1 11,7V5.73C10.4,5.39 10,4.74 10,4A2,2 0 0,1 12,2Z" />
                            </svg>
                        </div>
                        <div class="card-title">Alertes</div>
                    </div>
                    <div id="alertsList">
                        <div class="alert-item">
                            <div class="alert-icon">⚠️</div>
                            <div>
                                <strong>Nouveau résultat</strong><br>
                                <small>Analyse sanguine disponible</small>
                            </div>
                        </div>
                        <div class="alert-item info">
                            <div class="alert-icon">📅</div>
                            <div>
                                <strong>Rappel RDV</strong><br>
                                <small>Rendez-vous dans 2 jours</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Messages -->
                <div class="card" style="margin-top: 25px;">
                    <div class="card-header">
                        <div class="card-icon icon-messages">
                            <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                <path d="M20,2H4A2,2 0 0,0 2,4V22L6,18H20A2,2 0 0,0 22,16V4A2,2 0 0,0 20,2Z" />
                            </svg>
                        </div>
                        <div class="card-title">Messages</div>
                    </div>
                    <div id="messagesList">
                        <div class="message-item unread">
                            <div class="message-avatar">DM</div>
                            <div class="message-content">
                                <h4>Dr. Martin</h4>
                                <p>Réponse à votre question sur...</p>
                            </div>
                        </div>
                        <div class="message-item">
                            <div class="message-avatar">C</div>
                            <div class="message-content">
                                <h4>Cabinet</h4>
                                <p>Confirmation de rendez-vous</p>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-secondary">Voir tous</a>
                </div>

                <!-- Informations Personnelles -->
                <div class="card" style="margin-top: 25px;">
                    <div class="card-header">
                        <div class="card-icon icon-profile">
                            <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                <path
                                    d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                            </svg>
                        </div>
                        <div class="card-title">Profil</div>
                    </div>
                    <div class="personal-info-grid" id="personalInfo">
                        <div class="info-item">
                            <div class="info-label">Nom complet</div>
                            <div class="info-value">Jean Dupont</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Email</div>
                            <div class="info-value">jean.dupont@email.com</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Téléphone</div>
                            <div class="info-value">+33 1 23 45 67 89</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Médecin traitant</div>
                            <div class="info-value">Dr. Martin</div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-secondary">Modifier</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simulation des données API Laravel
        const apiData = {
            patient: {
                id: 12345,
                name: "Jean Dupont",
                email: "jean.dupont@email.com",
                phone: "+33 1 23 45 67 89",
                doctor: "Dr. Martin"
            },
            appointments: [{
                    id: 1,
                    date: "2025-07-28",
                    time: "10:00",
                    doctor: "Dr. Martin",
                    type: "Consultation générale",
                    location: "Cabinet médical Centre-ville"
                },
                {
                    id: 2,
                    date: "2025-08-05",
                    time: "14:30",
                    doctor: "Dr. Dubois",
                    type: "Suivi spécialisé",
                    location: "Clinique Saint-Pierre"
                }
            ],
            results: [{
                    id: 1,
                    type: "Analyse sanguine complète",
                    date: "2025-07-25",
                    doctor: "Dr. Martin",
                    status: "nouveau"
                },
                {
                    id: 2,
                    type: "Radiographie thoracique",
                    date: "2025-07-20",
                    doctor: "Dr. Dubois",
                    status: "normal"
                }
            ],
            messages: [{
                    id: 1,
                    from: "Dr. Martin",
                    subject: "Réponse à votre question sur...",
                    unread: true
                },
                {
                    id: 2,
                    from: "Cabinet",
                    subject: "Confirmation de rendez-vous",
                    unread: false
                }
            ],
            alerts: [{
                    type: "warning",
                    title: "Nouveau résultat",
                    message: "Analyse sanguine disponible"
                },
                {
                    type: "info",
                    title: "Rappel RDV",
                    message: "Rendez-vous dans 2 jours"
                }
            ]
        };

        // Fonction pour formater la date
        function formatDate() {
            const today = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            return today.toLocaleDateString('fr-FR', options);
        }

        // Fonction pour initialiser les avatars
        function initializeAvatar(name) {
            const initials = name.split(' ').map(n => n[0]).join('');
            return initials.toUpperCase();
        }

        // Initialisation du dashboard
        function initializeDashboard() {
            // Date actuelle
            document.getElementById('currentDate').textContent = formatDate();

            // Informations utilisateur
            document.getElementById('patientName').textContent = apiData.patient.name;
            document.getElementById('userAvatar').textContent = initializeAvatar(apiData.patient.name);

            // Statistiques
            document.getElementById('appointmentsCount').textContent = apiData.appointments.length;
            document.getElementById('resultsCount').textContent = apiData.results.filter(r => r.status === 'nouveau')
                .length;
            document.getElementById('messagesCount').textContent = apiData.messages.filter(m => m.unread).length;

            console.log('Dashboard initialisé avec les données API');
        }

        // Simulation d'appel API Laravel
        function loadPatientData() {
            // Simuler un délai de chargement
            setTimeout(() => {
                initializeDashboard();
            }, 500);
        }

        // Charger les données au chargement de la page
        document.addEventListener('DOMContentLoaded', loadPatientData);

        // Fonctions pour les interactions futures avec l'API Laravel
        function makeAppointment() {
            console.log('Redirection vers la prise de rendez-vous');
            // fetch('/api/appointments/create', {...})
        }

        function viewAllResults() {
            console.log('Chargement de tous les résultats');
            // fetch('/api/results', {...})
        }

        function sendMessage() {
            console.log('Ouverture de la messagerie');
            // fetch('/api/messages/compose', {...})
        }

        function updateProfile() {
            console.log('Modification du profil');
            // fetch('/api/patient/update', {...})
        }
    </script>
</body>

</html>
</x-layouts.app>