<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Docteur</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #2c5aa0 0%, #1e3c72 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1600px;
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

        .doctor-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2c5aa0, #1e3c72);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            margin-bottom: 30px;
        }

        .main-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
        }

        .left-panel {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .today-appointments {
            display: grid;
            grid-template-columns: 1fr 1fr;
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
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .card-title-section {
            display: flex;
            align-items: center;
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

        .stat-trend {
            font-size: 12px;
            font-weight: 600;
            margin-top: 8px;
        }

        .trend-up { color: #48bb78; }
        .trend-down { color: #f56565; }

        .appointment-item {
            display: flex;
            align-items: center;
            padding: 15px;
            background: #f7fafc;
            border-radius: 12px;
            margin-bottom: 12px;
            border-left: 4px solid #2c5aa0;
            transition: all 0.2s ease;
        }

        .appointment-item:hover {
            background: #edf2f7;
            transform: translateX(5px);
        }

        .appointment-time {
            background: #2c5aa0;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 600;
            margin-right: 15px;
            min-width: 70px;
            text-align: center;
            font-size: 14px;
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

        .appointment-status {
            margin-left: auto;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-pending { background: #fed7d7; color: #c53030; }
        .status-confirmed { background: #c6f6d5; color: #2f855a; }
        .status-urgent { background: #fbb6ce; color: #b83280; }

        .patient-item {
            display: flex;
            align-items: center;
            padding: 15px;
            background: #f7fafc;
            border-radius: 12px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .patient-item:hover {
            background: #edf2f7;
            transform: translateX(5px);
        }

        .patient-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 15px;
        }

        .patient-info h4 {
            color: #2d3748;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .patient-info p {
            color: #718096;
            font-size: 14px;
        }

        .priority-indicator {
            margin-left: auto;
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .priority-high { background: #f56565; }
        .priority-medium { background: #ed8936; }
        .priority-low { background: #48bb78; }

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
            background: #2c5aa0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 12px;
        }

        .btn {
            background: linear-gradient(135deg, #2c5aa0, #1e3c72);
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
            box-shadow: 0 8px 25px rgba(44, 90, 160, 0.4);
        }

        .btn-secondary {
            background: #edf2f7;
            color: #4a5568;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-small {
            padding: 8px 16px;
            font-size: 14px;
            margin: 0;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 20px;
        }

        .calendar-widget {
            background: #f7fafc;
            border-radius: 12px;
            padding: 15px;
            margin-top: 15px;
        }

        .calendar-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 15px;
        }

        .calendar-day {
            display: inline-block;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
            margin: 2px;
            font-size: 14px;
            cursor: pointer;
        }

        .calendar-day.today {
            background: #2c5aa0;
            color: white;
        }

        .calendar-day.has-appointments {
            background: #fed7d7;
            color: #c53030;
        }

        /* Couleurs pour les icônes */
        .icon-patients { background: linear-gradient(135deg, #667eea, #764ba2); }
        .icon-appointments { background: linear-gradient(135deg, #f093fb, #f5576c); }
        .icon-consultations { background: linear-gradient(135deg, #4facfe, #00f2fe); }
        .icon-revenue { background: linear-gradient(135deg, #43e97b, #38f9d7); }
        .icon-calendar { background: linear-gradient(135deg, #fa709a, #fee140); }
        .icon-messages { background: linear-gradient(135deg, #a8edea, #fed6e3); }
        .icon-tasks { background: linear-gradient(135deg, #ff9a9e, #fecfef); }

        .progress-bar {
            width: 100%;
            height: 6px;
            background: #e2e8f0;
            border-radius: 3px;
            margin-top: 10px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(135deg, #2c5aa0, #1e3c72);
            border-radius: 3px;
            transition: width 0.3s ease;
        }

        /* Responsive */
        @media (max-width: 1400px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .main-content {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            .today-appointments {
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

        .alert-badge {
            background: #f56565;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="welcome-section">
                <h1>Bonjour, <span id="doctorName">Dr. Martin</span></h1>
                <p>Aujourd'hui, <span id="currentDate"></span></p>
            </div>
            <div class="doctor-info">
                <div class="avatar" id="doctorAvatar">DM</div>
                <div>
                    <p style="font-weight: 600; color: #2d3748;">Dr. Jean Martin</p>
                    <p style="font-size: 14px; color: #718096;">Médecin généraliste</p>
                </div>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="stats-grid">
            <div class="card">
                <div class="card-header">
                    <div class="card-title-section">
                        <div class="card-icon icon-patients">
                            <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zM4 18v-4h3v4h6v-4h3v4h4v-6H0v6h4z"/>
                            </svg>
                        </div>
                        <div class="card-title">Patients</div>
                    </div>
                </div>
                <div class="stat-number" id="totalPatients">247</div>
                <div class="stat-label">Total patients</div>
                <div class="stat-trend trend-up">↗ +12 ce mois</div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-title-section">
                        <div class="card-icon icon-appointments">
                            <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                <path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/>
                            </svg>
                        </div>
                        <div class="card-title">Aujourd'hui</div>
                    </div>
                </div>
                <div class="stat-number" id="todayAppointments">8</div>
                <div class="stat-label">Rendez-vous</div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 62.5%;"></div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-title-section">
                        <div class="card-icon icon-consultations">
                            <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <div class="card-title">Consultations</div>
                    </div>
                </div>
                <div class="stat-number" id="weekConsultations">32</div>
                <div class="stat-label">Cette semaine</div>
                <div class="stat-trend trend-up">↗ +8% vs semaine dernière</div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-title-section">
                        <div class="card-icon icon-revenue">
                            <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                <path d="M7 15h2c0 1.08 1.37 2 3 2s3-.92 3-2c0-1.1-.9-2-2-2h-2c-2.21 0-4-1.79-4-4 0-1.95 1.4-3.57 3.25-3.93V3h1.5v2.07c1.85.36 3.25 1.98 3.25 3.93h-2c0-1.08-1.37-2-3-2s-3 .92-3 2c0 1.1.9 2 2 2h2c2.21 0 4 1.79 4 4 0 1.95-1.4 3.57-3.25 3.93V21h-1.5v-2.07C8.4 18.57 7 16.95 7 15z"/>
                            </svg>
                        </div>
                        <div class="card-title">Revenus</div>
                    </div>
                </div>
                <div class="stat-number" id="monthRevenue">€2,480</div>
                <div class="stat-label">Ce mois</div>
                <div class="stat-trend trend-up">↗ +15% vs mois dernier</div>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="main-content">
            <div class="left-panel">
                <!-- Rendez-vous d'aujourd'hui -->
                <div class="today-appointments">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title-section">
                                <div class="card-icon icon-calendar">
                                    <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                    </svg>
                                </div>
                                <div class="card-title">Agenda du jour</div>
                            </div>
                            <div class="alert-badge">5</div>
                        </div>
                        <div id="todayAppointmentsList">
                            <div class="appointment-item">
                                <div class="appointment-time">09:00</div>
                                <div class="appointment-details">
                                    <h4>Marie Dubois</h4>
                                    <p>Consultation générale</p>
                                </div>
                                <div class="appointment-status status-confirmed">Confirmé</div>
                            </div>
                            <div class="appointment-item">
                                <div class="appointment-time">10:30</div>
                                <div class="appointment-details">
                                    <h4>Pierre Moreau</h4>
                                    <p>Suivi diabète</p>
                                </div>
                                <div class="appointment-status status-pending">En attente</div>
                            </div>
                            <div class="appointment-item">
                                <div class="appointment-time">14:00</div>
                                <div class="appointment-details">
                                    <h4>Sophie Laurent</h4>
                                    <p>Résultats analyses</p>
                                </div>
                                <div class="appointment-status status-urgent">Urgent</div>
                            </div>
                        </div>
                        <div class="quick-actions">
                            <a href="#" class="btn btn-small">Voir planning</a>
                            <a href="#" class="btn btn-secondary btn-small">Ajouter RDV</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title-section">
                                <div class="card-icon icon-tasks">
                                    <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                        <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
                                    </svg>
                                </div>
                                <div class="card-title">Tâches prioritaires</div>
                            </div>
                        </div>
                        <div id="priorityTasks">
                            <div class="patient-item">
                                <div class="patient-avatar">MD</div>
                                <div class="patient-info">
                                    <h4>Résultats Marie D.</h4>
                                    <p>Analyse sanguine à valider</p>
                                </div>
                                <div class="priority-indicator priority-high"></div>
                            </div>
                            <div class="patient-item">
                                <div class="patient-avatar">JL</div>
                                <div class="patient-info">
                                    <h4>Ordonnance Jean L.</h4>
                                    <p>Renouvellement traitement</p>
                                </div>
                                <div class="priority-indicator priority-medium"></div>
                            </div>
                            <div class="patient-item">
                                <div class="patient-avatar">AB</div>
                                <div class="patient-info">
                                    <h4>Rapport Anaïs B.</h4>
                                    <p>Certificat médical</p>
                                </div>
                                <div class="priority-indicator priority-low"></div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-secondary btn-small">Voir toutes</a>
                    </div>
                </div>

                <!-- Patients récents -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-section">
                            <div class="card-icon icon-patients">
                                <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                    <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zM4 18v-4h3v4h6v-4h3v4h4v-6H0v6h4z"/>
                                </svg>
                            </div>
                            <div class="card-title">Patients récents</div>
                        </div>
                        <a href="#" class="btn btn-secondary btn-small">Nouveau patient</a>
                    </div>
                    <div id="recentPatients">
                        <div class="patient-item">
                            <div class="patient-avatar">MD</div>
                            <div class="patient-info">
                                <h4>Marie Dubois</h4>
                                <p>Dernière visite: 25/07/2025</p>
                            </div>
                        </div>
                        <div class="patient-item">
                            <div class="patient-avatar">PM</div>
                            <div class="patient-info">
                                <h4>Pierre Moreau</h4>
                                <p>Dernière visite: 23/07/2025</p>
                            </div>
                        </div>
                        <div class="patient-item">
                            <div class="patient-avatar">SL</div>
                            <div class="patient-info">
                                <h4>Sophie Laurent</h4>
                                <p>Dernière visite: 20/07/2025</p>
                            </div>
                        </div>
                        <div class="patient-item">
                            <div class="patient-avatar">JD</div>
                            <div class="patient-info">
                                <h4>Jean Dupont</h4>
                                <p>Dernière visite: 18/07/2025</p>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-secondary">Voir tous les patients</a>
                </div>
            </div>

            <!-- Panel droit -->
            <div class="right-panel">
                <!-- Messages -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-section">
                            <div class="card-icon icon-messages">
                                <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                    <path d="M20,2H4A2,2 0 0,0 2,4V22L6,18H20A2,2 0 0,0 22,16V4A2,2 0 0,0 20,2Z"/>
                                </svg>
                            </div>
                            <div class="card-title">Messages</div>
                        </div>
                        <div class="alert-badge">3</div>
                    </div>
                    <div id="messagesList">
                        <div class="message-item unread">
                            <div class="message-avatar">MD</div>
                            <div class="message-content">
                                <h4>Marie Dubois</h4>
                                <p>Question post-consultation</p>
                            </div>
                        </div>
                        <div class="message-item unread">
                            <div class="message-avatar">SL</div>
                            <div class="message-content">
                                <h4>Sophie Laurent</h4>
                                <p>Demande ordonnance</p>
                            </div>
                        </div>
                        <div class="message-item">
                            <div class="message-avatar">PM</div>
                            <div class="message-content">
                                <h4>Pierre Moreau</h4>
                                <p>Remerciements</p>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-secondary">Voir tous</a>
                </div>

                <!-- Statistiques hebdomadaires -->
                <div class="card" style="margin-top: 25px;">
                    <div class="card-header">
                        <div class="card-title-section">
                            <div class="card-icon icon-consultations">
                                <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                                    <path d="M3,3H21A2,2 0 0,1 23,5V19A2,2 0 0,1 21,21H3A2,2 0 0,1 1,19V5A2,2 0 0,1 3,3M5,7V9H19V7H5M5,11V13H19V11H5M5,15V17H19V15H5Z"/>
                                </svg>
                            </div>
                            <div class="card-title">Cette semaine</div>
                        </div>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-top: 15px;">
                        <div style="text-align: center; padding: 15px; background: #f7fafc; border-radius: 12px;">
                            <div style="font-size: 24px; font-weight: 700; color: #2c5aa0;">32</div>
                            <div style="font-size: 12px; color: #718096;">Consultations</div>
                        </div>
                        <div style="text-align: center; padding: 15px; background: #f7fafc; border-radius: 12px;">
                            <div style="font-size: 24px; font-weight: 700; color: #38b2ac;">€1,280</div>
                            <div style="font-size: 12px; color: #718096;">Revenus</div>
                        </div>
                        <div style="text-align: center; padding: 15px; background: #f7fafc; border-radius: 12px;">
                            <div style="font-size: 24px; font-weight: 700; color: #ed8936;">15</div>
                            <div style="font-size: 12px; color: #718096;">Nouveaux patients</div>
                        </div>
                        <div style="text-align: center; padding: 15px; background: #f7fafc; border-radius: 12px;">
                            <div style="font-size: 24px; font-weight: 700; color: #48bb78;">4.8</div>
                            <div style="font-size: 12px; color: #718096;">Note moyenne</div>
                        </div>
                    </div>