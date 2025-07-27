<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prendre un Rendez-vous - Espace Patient</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
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

        .back-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .back-btn {
            background: #edf2f7;
            border: none;
            padding: 10px;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .back-btn:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        .page-title {
            color: #2d3748;
            font-size: 28px;
            font-weight: 700;
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

        .booking-container {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 30px;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .form-section {
            margin-bottom: 30px;
        }

        .section-title {
            color: #2d3748;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-icon {
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            color: #4a5568;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .availability-card {
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            margin-top: 15px;
        }

        .availability-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .doctor-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .doctor-avatar-large {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 24px;
        }

        .doctor-info h4 {
            color: #2d3748;
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 18px;
        }

        .doctor-info p {
            color: #718096;
            margin-bottom: 8px;
        }

        .doctor-status {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .status-indicator.available {
            background: #48bb78;
            box-shadow: 0 0 0 2px rgba(72, 187, 120, 0.2);
        }

        .status-indicator.busy {
            background: #f56565;
            box-shadow: 0 0 0 2px rgba(245, 101, 101, 0.2);
        }

        .status-indicator.limited {
            background: #ed8936;
            box-shadow: 0 0 0 2px rgba(237, 137, 54, 0.2);
        }

        .availability-details {
            background: #f7fafc;
            border-radius: 8px;
            padding: 15px;
        }

        .availability-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .availability-item:last-child {
            margin-bottom: 0;
        }

        .availability-label {
            color: #718096;
            font-weight: 500;
        }

        .availability-value {
            color: #2d3748;
            font-weight: 600;
        }

        .time-slots {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
            margin-top: 15px;
        }

        .time-slot {
            padding: 10px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
            font-weight: 500;
        }

        .time-slot:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
        }

        .time-slot.selected {
            border-color: #667eea;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .time-slot.unavailable {
            background: #f7fafc;
            color: #a0aec0;
            cursor: not-allowed;
            border-color: #e2e8f0;
        }

        .time-slot.unavailable:hover {
            border-color: #e2e8f0;
            background: #f7fafc;
        }

        .calendar-container {
            background: white;
            border-radius: 12px;
            padding: 20px;
            border: 2px solid #e2e8f0;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .calendar-nav {
            background: #f7fafc;
            border: none;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .calendar-nav:hover {
            background: #edf2f7;
        }

        .calendar-month {
            font-weight: 600;
            color: #2d3748;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }

        .calendar-day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .calendar-day:hover {
            background: rgba(102, 126, 234, 0.1);
        }

        .calendar-day.selected {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .calendar-day.disabled {
            color: #a0aec0;
            cursor: not-allowed;
        }

        .calendar-day.today {
            border: 2px solid #667eea;
        }

        .btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            font-size: 16px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn:disabled {
            background: #a0aec0;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .btn-secondary {
            background: #edf2f7;
            color: #4a5568;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .summary-card {
            background: #f7fafc;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .summary-title {
            color: #2d3748;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e2e8f0;
        }

        .summary-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .summary-label {
            color: #718096;
            font-weight: 500;
        }

        .summary-value {
            color: #2d3748;
            font-weight: 600;
        }

        .alert {
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-info {
            background: #bee3f8;
            border: 1px solid #63b3ed;
            color: #2b6cb0;
        }

        .alert-success {
            background: #c6f6d5;
            border: 1px solid #68d391;
            color: #2f855a;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .booking-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .doctor-grid {
                grid-template-columns: 1fr;
            }

            .time-slots {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .loading {
            text-align: center;
            color: #718096;
            font-style: italic;
            padding: 20px;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="back-section">
                <button class="back-btn" onclick="goBack()">
                    <svg width="20" height="20" fill="#4a5568" viewBox="0 0 24 24">
                        <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.42-1.41L7.83 13H20v-2z" />
                    </svg>
                </button>
                <h1 class="page-title">Prendre un Rendez-vous</h1>
            </div>
            <div class="user-info">
                <div class="avatar" id="userAvatar">JD</div>
                <div>
                    <p style="font-weight: 600; color: #2d3748;">Jean Dupont</p>
                    <p style="font-size: 14px; color: #718096;">Patient ID: #12345</p>
                </div>
            </div>
        </div>

        <div class="booking-container">
            <!-- Formulaire principal -->
            <div class="card">
                <form id="appointmentForm">
                    <!-- Section: Type de consultation -->
                    <div class="form-section">
                        <h2 class="section-title">
                            <div class="section-icon">
                                <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                                    <path
                                        d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z" />
                                </svg>
                            </div>
                            Type de consultation
                        </h2>

                        <div class="form-group">
                            <label class="form-label" for="consultationType">Motif de consultation</label>
                            <select class="form-control" id="consultationType" required>
                                <option value="">Sélectionnez un motif</option>
                                <option value="consultation-generale">Consultation générale</option>
                                <option value="suivi-medical">Suivi médical</option>
                                <option value="controle-post-op">Contrôle post-opératoire</option>
                                <option value="urgence">Consultation d'urgence</option>
                                <option value="vaccination">Vaccination</option>
                                <option value="bilan-sante">Bilan de santé</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="symptoms">Symptômes ou description (optionnel)</label>
                            <textarea class="form-control" id="symptoms" rows="3"
                                placeholder="Décrivez brièvement vos symptômes ou la raison de votre consultation..."></textarea>
                        </div>
                    </div>

                    <!-- Section: Choix du médecin -->
                    <div class="form-section">
                        <h2 class="section-title">
                            <div class="section-icon">
                                <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                                    <path
                                        d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                                </svg>
                            </div>
                            Choisir un médecin
                        </h2>

                        <!-- Sélection de la catégorie -->
                        <div class="form-group">
                            <label class="form-label" for="doctorCategory">Catégorie de médecin</label>
                            <select class="form-control" id="doctorCategory" required>
                                <option value="">Sélectionnez une catégorie</option>
                                <option value="generaliste">Généraliste</option>
                                <option value="pediatre">Pédiatre</option>
                                <option value="cardiologue">Cardiologue</option>
                                <option value="dermatologue">Dermatologue</option>
                                <option value="psychologue">Psychologue</option>
                                <option value="gynécologue">Gynécologue</option>
                                <option value="ophtalmologue">Ophtalmologue</option>
                                <option value="oto-rhino-laryngologiste">ORL</option>
                            </select>
                        </div>

                        <!-- Dropdown des médecins -->
                        <div class="form-group">
                            <label class="form-label" for="doctorSelect">Médecin</label>
                            <select class="form-control" id="doctorSelect" required disabled>
                                <option value="">Sélectionnez d'abord une catégorie</option>
                            </select>
                        </div>

                        <!-- Disponibilités du médecin sélectionné -->
                        <div id="doctorAvailabilitySection" class="hidden">
                            <h3 style="margin: 20px 0 15px 0; color: #2d3748; font-weight: 600;">Disponibilités du
                                médecin</h3>
                            <div class="availability-card">
                                <div class="availability-header">
                                    <div class="doctor-info">
                                        <div class="doctor-avatar-large" id="selectedDoctorAvatar">DR</div>
                                        <div>
                                            <h4 id="selectedDoctorName">Dr. Martin</h4>
                                            <p id="selectedDoctorSpecialty">Médecine générale</p>
                                            <div class="doctor-status">
                                                <span class="status-indicator available" id="doctorStatus"></span>
                                                <span id="doctorStatusText">Disponible aujourd'hui</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="availability-details">
                                    <div class="availability-item">
                                        <span class="availability-label">Prochaine disponibilité :</span>
                                        <span class="availability-value" id="nextAvailability">Demain à 10:30</span>
                                    </div>
                                    <div class="availability-item">
                                        <span class="availability-label">Lieu de consultation :</span>
                                        <span class="availability-value" id="consultationLocation">Cabinet
                                            Centre-ville</span>
                                    </div>
                                    <div class="availability-item">
                                        <span class="availability-label">Durée moyenne :</span>
                                        <span class="availability-value" id="consultationDuration">30 minutes</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Date et heure -->
                    <div class="form-section">
                        <h2 class="section-title">
                            <div class="section-icon">
                                <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                                    <path
                                        d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z" />
                                </svg>
                            </div>
                            Date et heure
                        </h2>

                        <div class="calendar-container">
                            <div class="calendar-header">
                                <button type="button" class="calendar-nav" onclick="previousMonth()">‹</button>
                                <div class="calendar-month" id="currentMonth">Juillet 2025</div>
                                <button type="button" class="calendar-nav" onclick="nextMonth()">›</button>
                            </div>
                            <div class="calendar-grid" id="calendarGrid">
                                <!-- Généré par JavaScript -->
                            </div>
                        </div>

                        <div id="timeSlotsSection" class="hidden">
                            <h3 style="margin: 20px 0 15px 0; color: #2d3748; font-weight: 600;">Créneaux disponibles
                            </h3>
                            <div class="time-slots" id="timeSlots">
                                <!-- Généré par JavaScript -->
                            </div>
                        </div>
                    </div>

                    <!-- Informations de contact -->
                    <div class="form-section">
                        <h2 class="section-title">
                            <div class="section-icon">
                                <svg width="16" height="16" fill="white" viewBox="0 0 24 24">
                                    <path
                                        d="M20,4H4C2.9,4 2,4.9 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C0,4.9 21.1,4 20,4Z" />
                                </svg>
                            </div>
                            Informations de contact
                        </h2>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control" id="email"
                                    value="jean.dupont@email.com" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone">Téléphone</label>
                                <input type="tel" class="form-control" id="phone" value="+33 1 23 45 67 89"
                                    readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="notes">Notes additionnelles (optionnel)</label>
                            <textarea class="form-control" id="notes" rows="2"
                                placeholder="Informations supplémentaires à communiquer au médecin..."></textarea>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Résumé et validation -->
            <div>
                <div class="card">
                    <div class="summary-card">
                        <h3 class="summary-title">Résumé de votre rendez-vous</h3>
                        <div id="appointmentSummary">
                            <div class="summary-item">
                                <span class="summary-label">Motif :</span>
                                <span class="summary-value" id="summaryType">-</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Médecin :</span>
                                <span class="summary-value" id="summaryDoctor">-</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Spécialité :</span>
                                <span class="summary-value" id="summarySpecialite">-</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Date :</span>
                                <span class="summary-value" id="summaryDate">-</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Heure :</span>
                                <span class="summary-value" id="summaryTime">-</span>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-info">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                        </svg>
                        <span>Un email de confirmation vous sera envoyé après validation du rendez-vous.</span>
                    </div>

                    <div style="display: flex; gap: 15px;">
                        <button type="button" class="btn btn-secondary" onclick="goBack()">Annuler</button>
                        <button type="submit" class="btn" id="submitBtn" disabled
                            onclick="submitAppointment()">Confirmer le rendez-vous</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Données simulées
        const appointmentData = {
            selectedDoctor: null,
            selectedDate: null,
            selectedTime: null,
            consultationType: null
        };

        // Données simulées pour les médecins par catégorie
        const doctorsByCategory = {
            generaliste: [{
                    id: 'martin',
                    name: 'Dr. Martin',
                    specialty: 'Médecine générale',
                    avatar: 'DM',
                    status: 'available',
                    nextAvailability: 'Demain à 10:30',
                    location: 'Cabinet Centre-ville',
                    duration: '30 minutes'
                },
                {
                    id: 'durand',
                    name: 'Dr. Durand',
                    specialty: 'Médecine générale',
                    avatar: 'DD',
                    status: 'limited',
                    nextAvailability: 'Vendredi à 14:00',
                    location: 'Cabinet Centre-ville',
                    duration: '30 minutes'
                }
            ],
            pediatre: [{
                    id: 'rousseau',
                    name: 'Dr. Rousseau',
                    specialty: 'Pédiatrie',
                    avatar: 'DR',
                    status: 'available',
                    nextAvailability: 'Aujourd\'hui à 16:00',
                    location: 'Clinique Saint-Pierre',
                    duration: '45 minutes'
                },
                {
                    id: 'moreau',
                    name: 'Dr. Moreau',
                    specialty: 'Pédiatrie',
                    avatar: 'DM',
                    status: 'busy',
                    nextAvailability: 'Lundi prochain à 09:00',
                    location: 'Hôpital des Enfants',
                    duration: '45 minutes'
                }
            ],
            cardiologue: [{
                    id: 'dubois',
                    name: 'Dr. Dubois',
                    specialty: 'Cardiologie',
                    avatar: 'DD',
                    status: 'available',
                    nextAvailability: '03/08/2025 à 08:30',
                    location: 'Clinique Saint-Pierre',
                    duration: '60 minutes'
                },
                {
                    id: 'lambert',
                    name: 'Dr. Lambert',
                    specialty: 'Cardiologie',
                    avatar: 'DL',
                    status: 'limited',
                    nextAvailability: '10/08/2025 à 15:30',
                    location: 'Centre Cardiologique',
                    duration: '60 minutes'
                }
            ],
            dermatologue: [{
                id: 'bernard',
                name: 'Dr. Bernard',
                specialty: 'Dermatologie',
                avatar: 'DB',
                status: 'available',
                nextAvailability: '30/07/2025 à 11:00',
                location: 'Cabinet Dermatologique',
                duration: '20 minutes'
            }],
            psychologue: [{
                    id: 'garcia',
                    name: 'Dr. Garcia',
                    specialty: 'Psychologie',
                    avatar: 'DG',
                    status: 'available',
                    nextAvailability: '29/07/2025 à 14:30',
                    location: 'Cabinet de Psychologie',
                    duration: '50 minutes'
                },
                {
                    id: 'petit',
                    name: 'Dr. Petit',
                    specialty: 'Psychologie',
                    avatar: 'DP',
                    status: 'limited',
                    nextAvailability: '05/08/2025 à 10:00',
                    location: 'Centre de Thérapie',
                    duration: '50 minutes'
                }
            ],
            gynécologue: [{
                id: 'thomas',
                name: 'Dr. Thomas',
                specialty: 'Gynécologie',
                avatar: 'DT',
                status: 'available',
                nextAvailability: '02/08/2025 à 13:30',
                location: 'Clinique de la Femme',
                duration: '40 minutes'
            }],
            ophtalmologue: [{
                id: 'robert',
                name: 'Dr. Robert',
                specialty: 'Ophtalmologie',
                avatar: 'DR',
                status: 'busy',
                nextAvailability: '12/08/2025 à 09:30',
                location: 'Centre Ophtalmologique',
                duration: '30 minutes'
            }],
            'oto-rhino-laryngologiste': [{
                id: 'simon',
                name: 'Dr. Simon',
                specialty: 'ORL',
                avatar: 'DS',
                status: 'available',
                nextAvailability: '01/08/2025 à 16:30',
                location: 'Cabinet ORL',
                duration: '35 minutes'
            }]
        };

        const doctors = {}; // Sera rempli dynamiquement

        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            generateCalendar();
            initializeEventListeners();
        });

        function initializeEventListeners() {
            // Sélection du type de consultation
            document.getElementById('consultationType').addEventListener('change', function() {
                appointmentData.consultationType = this.value;
                updateSummary();
                checkFormCompletion();
            });

            // Sélection de la catégorie de médecin
            document.getElementById('doctorCategory').addEventListener('change', function() {
                const category = this.value;
                const doctorSelect = document.getElementById('doctorSelect');

                // Réinitialiser la sélection
                doctorSelect.innerHTML = '<option value="">Choisissez un médecin</option>';
                document.getElementById('doctorAvailabilitySection').classList.add('hidden');

                if (category && doctorsByCategory[category]) {
                    // Activer le dropdown des médecins
                    doctorSelect.disabled = false;

                    // Remplir les options
                    doctorsByCategory[category].forEach(doctor => {
                        const option = document.createElement('option');
                        option.value = doctor.id;
                        option.textContent = `${doctor.name} - ${doctor.specialty}`;
                        doctorSelect.appendChild(option);
                    });
                } else {
                    doctorSelect.disabled = true;
                    doctorSelect.innerHTML =
                        '<option value="">Sélectionnez d\'abord une catégorie</option>';
                }

                // Réinitialiser les données
                appointmentData.selectedDoctor = null;
                updateSummary();
                checkFormCompletion();
            });

            // Sélection du médecin
            document.getElementById('doctorSelect').addEventListener('change', function() {
                const doctorId = this.value;
                const category = document.getElementById('doctorCategory').value;

                if (doctorId && category && doctorsByCategory[category]) {
                    const doctor = doctorsByCategory[category].find(d => d.id === doctorId);
                    if (doctor) {
                        appointmentData.selectedDoctor = doctorId;
                        showDoctorAvailability(doctor);
                        updateSummary();
                        checkFormCompletion();
                    }
                } else {
                    document.getElementById('doctorAvailabilitySection').classList.add('hidden');
                    appointmentData.selectedDoctor = null;
                    updateSummary();
                    checkFormCompletion();
                }
            });
        }

        function showDoctorAvailability(doctor) {
            const section = document.getElementById('doctorAvailabilitySection');

            // Mettre à jour les informations du médecin
            document.getElementById('selectedDoctorAvatar').textContent = doctor.avatar;
            document.getElementById('selectedDoctorName').textContent = doctor.name;
            document.getElementById('selectedDoctorSpecialty').textContent = doctor.specialty;

            // Mettre à jour le statut
            const statusIndicator = document.getElementById('doctorStatus');
            const statusText = document.getElementById('doctorStatusText');

            statusIndicator.className = `status-indicator ${doctor.status}`;

            switch (doctor.status) {
                case 'available':
                    statusText.textContent = 'Disponible aujourd\'hui';
                    break;
                case 'limited':
                    statusText.textContent = 'Disponibilités limitées';
                    break;
                case 'busy':
                    statusText.textContent = 'Très occupé';
                    break;
            }

            // Mettre à jour les détails
            document.getElementById('nextAvailability').textContent = doctor.nextAvailability;
            document.getElementById('consultationLocation').textContent = doctor.location;
            document.getElementById('consultationDuration').textContent = doctor.duration;

            // Afficher la section
            section.classList.remove('hidden');
        }

        function generateCalendar() {
            const calendarGrid = document.getElementById('calendarGrid');
            const monthElement = document.getElementById('currentMonth');

            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();

            // Mettre à jour le titre du mois
            const monthNames = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
                'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
            ];
            monthElement.textContent = `${monthNames[month]} ${year}`;

            // Nettoyer la grille
            calendarGrid.innerHTML = '';

            // Ajouter les en-têtes des jours
            const dayHeaders = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
            dayHeaders.forEach(day => {
                const dayHeader = document.createElement('div');
                dayHeader.textContent = day;
                dayHeader.style.fontWeight = '600';
                dayHeader.style.color = '#718096';
                dayHeader.style.textAlign = 'center';
                dayHeader.style.padding = '10px 0';
                calendarGrid.appendChild(dayHeader);
            });

            // Premier jour du mois et nombre de jours
            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const today = new Date();

            // Ajouter les espaces vides pour les jours du mois précédent
            for (let i = 0; i < firstDay; i++) {
                const emptyDay = document.createElement('div');
                calendarGrid.appendChild(emptyDay);
            }

            // Ajouter les jours du mois
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                dayElement.textContent = day;
                dayElement.className = 'calendar-day';

                const dayDate = new Date(year, month, day);

                // Marquer aujourd'hui
                if (dayDate.toDateString() === today.toDateString()) {
                    dayElement.classList.add('today');
                }

                // Désactiver les jours passés
                if (dayDate < today) {
                    dayElement.classList.add('disabled');
                } else {
                    dayElement.addEventListener('click', function() {
                        selectDate(year, month, day);
                    });
                }

                calendarGrid.appendChild(dayElement);
            }
        }

        function selectDate(year, month, day) {
            // Retirer la sélection précédente
            document.querySelectorAll('.calendar-day.selected').forEach(d => d.classList.remove('selected'));

            // Sélectionner le nouveau jour
            event.target.classList.add('selected');

            appointmentData.selectedDate = new Date(year, month, day);
            updateSummary();
            generateTimeSlots();
            checkFormCompletion();
        }

        function generateTimeSlots() {
            const timeSlotsSection = document.getElementById('timeSlotsSection');
            const timeSlots = document.getElementById('timeSlots');

            timeSlotsSection.classList.remove('hidden');
            timeSlots.innerHTML = '';

            // Créneaux simulés
            const slots = [{
                    time: '08:00',
                    available: true
                },
                {
                    time: '08:30',
                    available: true
                },
                {
                    time: '09:00',
                    available: false
                },
                {
                    time: '09:30',
                    available: true
                },
                {
                    time: '10:00',
                    available: true
                },
                {
                    time: '10:30',
                    available: false
                },
                {
                    time: '11:00',
                    available: true
                },
                {
                    time: '11:30',
                    available: true
                },
                {
                    time: '14:00',
                    available: true
                },
                {
                    time: '14:30',
                    available: true
                },
                {
                    time: '15:00',
                    available: true
                },
                {
                    time: '15:30',
                    available: false
                },
                {
                    time: '16:00',
                    available: true
                },
                {
                    time: '16:30',
                    available: true
                },
                {
                    time: '17:00',
                    available: true
                }
            ];

            slots.forEach(slot => {
                const slotElement = document.createElement('div');
                slotElement.textContent = slot.time;
                slotElement.className = 'time-slot';

                if (!slot.available) {
                    slotElement.classList.add('unavailable');
                } else {
                    slotElement.addEventListener('click', function() {
                        selectTimeSlot(slot.time, this);
                    });
                }

                timeSlots.appendChild(slotElement);
            });
        }

        function selectTimeSlot(time, element) {
            // Retirer la sélection précédente
            document.querySelectorAll('.time-slot.selected').forEach(s => s.classList.remove('selected'));

            // S
