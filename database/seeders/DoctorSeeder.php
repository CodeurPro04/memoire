<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialties = [
            'Médecine générale',
            'Cardiologie',
            'Pédiatrie',
            'Gynécologie',
            'Chirurgie',
            'Dermatologie',
            'Ophtalmologie',
            'ORL',
            'Neurologie',
            'Psychiatrie'
        ];

        $doctors = [
            [
                'first_name' => 'Dr. Amadou',
                'last_name' => 'Diallo',
                'email' => 'amadou.diallo@hopital.com',
                'phone' => '+225 01 23 45 67 89',
                'specialty' => 'Médecine générale',
                'license_number' => 'DOC-001',
                'is_active' => true
            ],
            [
                'first_name' => 'Dr. Marie',
                'last_name' => 'Kouassi',
                'email' => 'marie.kouassi@hopital.com',
                'phone' => '+225 02 34 56 78 90',
                'specialty' => 'Pédiatrie',
                'license_number' => 'DOC-002',
                'is_active' => true
            ],
            [
                'first_name' => 'Dr. Ibrahim',
                'last_name' => 'Traoré',
                'email' => 'ibrahim.traore@hopital.com',
                'phone' => '+225 03 45 67 89 01',
                'specialty' => 'Cardiologie',
                'license_number' => 'DOC-003',
                'is_active' => true
            ],
            [
                'first_name' => 'Dr. Fatou',
                'last_name' => 'N\'Guessan',
                'email' => 'fatou.nguessan@hopital.com',
                'phone' => '+225 04 56 78 90 12',
                'specialty' => 'Gynécologie',
                'license_number' => 'DOC-004',
                'is_active' => true
            ],
            [
                'first_name' => 'Dr. Yves',
                'last_name' => 'Ouattara',
                'email' => 'yves.ouattara@hopital.com',
                'phone' => '+225 05 67 89 01 23',
                'specialty' => 'Chirurgie',
                'license_number' => 'DOC-005',
                'is_active' => false
            ]
        ];

        foreach ($doctors as $doctorData) {
            Doctor::create($doctorData);
        }

        // Créer des médecins aléatoires supplémentaires
        for ($i = 6; $i <= 15; $i++) {
            Doctor::create([
                'first_name' => 'Dr. ' . $this->getRandomFirstName(),
                'last_name' => $this->getRandomLastName(),
                'email' => 'doctor' . $i . '@hopital.com',
                'phone' => '+225 ' . sprintf('%02d %02d %02d %02d %02d', 
                    rand(1, 9), rand(10, 99), rand(10, 99), rand(10, 99), rand(10, 99)),
                'specialty' => $specialties[array_rand($specialties)],
                'license_number' => 'DOC-' . sprintf('%03d', $i),
                'is_active' => rand(0, 100) < 95 // 95% actifs
            ]);
        }
    }

    private function getRandomFirstName()
    {
        $names = [
            'Amadou', 'Marie', 'Ibrahim', 'Fatou', 'Yves', 'Aïcha', 'Moussa',
            'Aminata', 'Seydou', 'Mariam', 'Bakary', 'Kadiatou'
        ];
        return $names[array_rand($names)];
    }

    private function getRandomLastName()
    {
        $names = [
            'Traoré', 'Ouattara', 'Koné', 'Coulibaly', 'Diallo', 'Bamba',
            'N\'Guessan', 'Kouadio', 'Yao', 'Koffi'
        ];
        return $names[array_rand($names)];
    }
}