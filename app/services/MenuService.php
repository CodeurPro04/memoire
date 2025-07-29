<?php

namespace App\Services;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;

class MenuService
{
    /**
     * Génère la structure complète du menu avec les données dynamiques
     */
    public static function getMenuStructure()
    {
        return [
            [
                'key' => 'dashboard',
                'title' => __('Tableau de bord'),
                'icon' => 'bx bx-home-circle',
                'icon_color' => 'text-primary',
                'route' => 'dashboard',
                'active_patterns' => ['dashboard'],
                'badge' => null,
                'children' => []
            ],
            [
                'key' => 'patients',
                'title' => __('Patients'),
                'icon' => 'bx bx-group',
                'icon_color' => 'text-success',
                'route' => null,
                'active_patterns' => ['patients*'],
                'badge' => [
                    'text' => self::getTotalPatients(),
                    'color' => 'bg-success'
                ],
                'children' => [
                    [
                        'key' => 'patients.index',
                        'title' => __('Liste des patients'),
                        'icon' => '',
                        'route' => 'patients.index',
                        'active_patterns' => ['patients.index', 'patients.show', 'patients.edit', 'patients.create']
                    ],
                    // [
                    //     'key' => 'patients.history',
                    //     'title' => __('Historique médical'),
                    //     'icon' => 'bx bx-history',
                    //     'route' => 'patients.history',
                    //     'active_patterns' => ['patients.history']
                    // ]
                ]
            ],
            [
                'key' => 'doctors',
                'title' => __('Professionnels'),
                'icon' => 'bx bx-user-check',
                'icon_color' => 'text-info',
                'route' => null,
                'active_patterns' => ['doctors*'],
                'badge' => [
                    'text' => self::getTotalDoctors(),
                    'color' => 'bg-info'
                ],
                'children' => [
                    [
                        'key' => 'doctors.index',
                        'title' => __('Liste des médecins'),
                        'icon' => '',
                        'route' => 'doctors.index',
                        'active_patterns' => ['doctors.index']
                    ],
                    [
                        'key' => 'doctors.specialties',
                        'title' => __('Spécialités'),
                        'icon' => '',
                        'route' => 'doctors.specialties',
                        'active_patterns' => ['doctors.specialties']
                    ]
                ]
            ],
            [
                'key' => 'appointments',
                'title' => __('Rendez-vous'),
                'icon' => 'bx bx-calendar',
                'icon_color' => 'text-warning',
                'route' => null,
                'active_patterns' => ['appointments*'],
                'badge' => [
                    'text' => self::getTodayAppointments(),
                    'color' => 'bg-warning'
                ],
                'children' => [
                    [
                        'key' => 'appointments.today',
                        'title' => __('Aujourd\'hui'),
                        'icon' => 'bx bx-calendar-check',
                        'route' => 'appointments.today',
                        'active_patterns' => ['appointments.today']
                    ],
                    [
                        'key' => 'appointments.upcoming',
                        'title' => __('À venir'),
                        'icon' => 'bx bx-calendar-plus',
                        'route' => 'appointments.upcoming',
                        'active_patterns' => ['appointments.upcoming']
                    ],
                    [
                        'key' => 'appointments.history',
                        'title' => __('Historique'),
                        'icon' => 'bx bx-calendar-minus',
                        'route' => 'appointments.history',
                        'active_patterns' => ['appointments.history']
                    ]
                ]
            ],
            [
                'key' => 'establishments',
                'title' => __('Établissements'),
                'icon' => 'bx bx-buildings',
                'icon_color' => 'text-danger',
                'route' => null,
                'active_patterns' => ['establishments*'],
                'badge' => null,
                'children' => [
                    [
                        'key' => 'establishments.hospitals',
                        'title' => __('Hôpitaux publics'),
                        'icon' => 'bx bx-plus-medical',
                        'route' => 'establishments.hospitals',
                        'active_patterns' => ['establishments.hospitals']
                    ],
                    [
                        'key' => 'establishments.clinics',
                        'title' => __('Cliniques privées'),
                        'icon' => 'bx bx-clinic',
                        'route' => 'establishments.clinics',
                        'active_patterns' => ['establishments.clinics']
                    ],
                    [
                        'key' => 'establishments.community',
                        'title' => __('Centres communautaires'),
                        'icon' => 'bx bx-home-heart',
                        'route' => 'establishments.community',
                        'active_patterns' => ['establishments.community']
                    ]
                ]
            ],
            [
                'key' => 'locations',
                'title' => __('Régions'),
                'icon' => 'bx bx-map',
                'icon_color' => 'text-purple',
                'route' => null,
                'active_patterns' => ['locations*'],
                'badge' => null,
                'children' => [

                    [
                        'key' => 'locations.rural',
                        'title' => __('Zones rurales'),
                        'icon' => 'bx bx-leaf',
                        'route' => 'locations.rural',
                        'active_patterns' => ['locations.rural'],
                        'badge' => ['text' => '234', 'color' => 'bg-warning']
                    ]
                ]
            ],
            [
                'key' => 'payments',
                'title' => __('Paiements'),
                'icon' => 'bx bx-mobile',
                'icon_color' => 'text-orange',
                'route' => null,
                'active_patterns' => ['payments*'],
                'badge' => null,
                'children' => [
                    [
                        'key' => 'payments.orange',
                        'title' => __('Orange Money'),
                        'icon' => 'bx bx-wallet',
                        'icon_style' => 'color: #FF7900;',
                        'route' => 'payments.orange',
                        'active_patterns' => ['payments.orange']
                    ],
                    [
                        'key' => 'payments.mtn',
                        'title' => __('MTN Money'),
                        'icon' => 'bx bx-credit-card',
                        'icon_style' => 'color: #FFCC00;',
                        'route' => 'payments.mtn',
                        'active_patterns' => ['payments.mtn']
                    ],
                    [
                        'key' => 'payments.history',
                        'title' => __('Historique'),
                        'icon' => 'bx bx-history',
                        'route' => 'payments.history',
                        'active_patterns' => ['payments.history']
                    ]
                ]
            ],
            [
                'key' => 'communications',
                'title' => __('Communications'),
                'icon' => 'bx bx-message-dots',
                'icon_color' => 'text-cyan',
                'route' => null,
                'active_patterns' => ['communications*'],
                'badge' => null,
                'children' => [
                    [
                        'key' => 'communications.sms',
                        'title' => __('SMS/Notifications'),
                        'icon' => 'bx bx-message',
                        'route' => 'communications.sms',
                        'active_patterns' => ['communications.sms']
                    ],
                    [
                        'key' => 'communications.campaigns',
                        'title' => __('Sensibilisation'),
                        'icon' => 'bx bx-bullhorn',
                        'route' => 'communications.campaigns',
                        'active_patterns' => ['communications.campaigns']
                    ],
                    [
                        'key' => 'communications.languages',
                        'title' => __('Langues locales'),
                        'icon' => 'bx bx-world',
                        'route' => 'communications.languages',
                        'active_patterns' => ['communications.languages']
                    ]
                ]
            ],
            // Divider pour Administration
            [
                'type' => 'divider',
                'title' => __('Administration')
            ],
            [
                'key' => 'reports',
                'title' => __('Rapports'),
                'icon' => 'bx bx-bar-chart-alt-2',
                'icon_color' => 'text-teal',
                'route' => null,
                'active_patterns' => ['reports*'],
                'badge' => null,
                'children' => [
                    [
                        'key' => 'reports.usage',
                        'title' => __('Utilisation app'),
                        'icon' => 'bx bx-trending-up',
                        'route' => 'reports.usage',
                        'active_patterns' => ['reports.usage']
                    ],
                    [
                        'key' => 'reports.health',
                        'title' => __('Santé publique'),
                        'icon' => 'bx bx-heart',
                        'route' => 'reports.health',
                        'active_patterns' => ['reports.health']
                    ]
                ]
            ],
            [
                'key' => 'settings',
                'title' => __('Paramètres'),
                'icon' => 'bx bx-cog',
                'icon_color' => 'text-dark',
                'route' => null,
                'active_patterns' => ['settings/*'],
                'badge' => null,
                'children' => [
                    [
                        'key' => 'settings.profile',
                        'title' => __('Profil'),
                        'icon' => 'bx bx-user',
                        'route' => 'settings.profile',
                        'active_patterns' => ['settings.profile']
                    ],
                    [
                        'key' => 'settings.password',
                        'title' => __('Mot de passe'),
                        'icon' => 'bx bx-lock',
                        'route' => 'settings.password',
                        'active_patterns' => ['settings.password']
                    ],
                    [
                        'key' => 'settings.system',
                        'title' => __('Système'),
                        'icon' => 'bx bx-server',
                        'route' => 'settings.system',
                        'active_patterns' => ['settings.system']
                    ]
                ]
            ],
            [
                'key' => 'support',
                'title' => __('Support technique'),
                'icon' => 'bx bx-support',
                'icon_color' => 'text-success',
                'route' => 'support',
                'active_patterns' => ['support'],
                'badge' => ['text' => '?', 'color' => 'bg-success'],
                'children' => []
            ]
        ];
    }

    /**
     * Vérifie si un menu est actif selon les patterns
     */
    public static function isMenuActive($patterns)
    {
        foreach ($patterns as $pattern) {
            if (request()->is($pattern)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Vérifie si un menu parent doit être ouvert
     */
    public static function isMenuOpen($menuItem)
    {
        if (self::isMenuActive($menuItem['active_patterns'])) {
            return true;
        }

        foreach ($menuItem['children'] as $child) {
            if (isset($child['active_patterns']) && self::isMenuActive($child['active_patterns'])) {
                return true;
            }
        }

        return false;
    }

    /**
     * Récupère le nombre total de patients
     */
    private static function getTotalPatients()
    {
        try {
            return Patient::count();
        } catch (\Exception $e) {
            return '1.2K'; // Valeur par défaut
        }
    }

    /**
     * Récupère le nombre total de médecins
     */
    private static function getTotalDoctors()
    {
        try {
            return Doctor::count();
        } catch (\Exception $e) {
            return '89'; // Valeur par défaut
        }
    }

    /**
     * Récupère le nombre de médecins en attente
     */
    private static function getPendingDoctors()
    {
        try {
            return Doctor::where('status', 'pending')->count();
        } catch (\Exception $e) {
            return '5'; // Valeur par défaut
        }
    }

    /**
     * Récupère le nombre de rendez-vous aujourd'hui
     */
    private static function getTodayAppointments()
    {
        try {
            return Appointment::whereDate('appointment_date', today())->count();
        } catch (\Exception $e) {
            return '156'; // Valeur par défaut
        }
    }

    /**
     * Récupère les statistiques de connectivité
     */
    public static function getConnectivityStats()
    {
        return [
            'online_percentage' => 88,
            'offline_percentage' => 12
        ];
    }
}