<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            'Abidjan',
            'Bouaké', 
            'Daloa',
            'Yamoussoukro',
            'San-Pédro',
            'Korhogo',
            'Man',
            'Divo',
            'Gagnoa',
            'Abengourou'
        ];

        $bloodTypes = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
        
        // Patients spécifiques pour les tests
        $specificPatients = [
            [
                'first_name' => 'Jean',
                'last_name' => 'Dupont',
                'email' => 'jean.dupont@email.com',
                'phone' => '+225 01 23 45 67 89',
                'date_of_birth' => '1990-01-15',
                'gender' => 'M',
                'address' => '123 Rue de la Paix, Cocody',
                'city' => 'Abidjan',
                'region' => 'Abidjan',
                'emergency_contact_name' => 'Marie Dupont',
                'emergency_contact_phone' => '+225 01 23 45 67 90',
                'blood_type' => 'A+',
                'allergies' => ['Pénicilline'],
                'medical_history' => ['Hypertension'],
                'insurance_number' => 'INS-12345678',
                'is_active' => true
            ],
            [
                'first_name' => 'Aïcha',
                'last_name' => 'Traoré',
                'email' => 'aicha.traore@email.com',
                'phone' => '+225 07 89 12 34 56',
                'date_of_birth' => '1985-08-22',
                'gender' => 'F',
                'address' => '456 Avenue des Martyrs',
                'city' => 'Bouaké',
                'region' => 'Bouaké',
                'emergency_contact_name' => 'Ibrahim Traoré',
                'emergency_contact_phone' => '+225 07 89 12 34 57',
                'blood_type' => 'O+',
                'allergies' => ['Arachides', 'Fruits de mer'],
                'medical_history' => ['Diabète type 2'],
                'insurance_number' => 'INS-87654321',
                'is_active' => true
            ],
            [
                'first_name' => 'Kouassi',
                'last_name' => 'N\'Guessan',
                'email' => 'kouassi.nguessan@email.com',
                'phone' => '+225 05 67 89 01 23',
                'date_of_birth' => '1975-12-05',
                'gender' => 'M',
                'address' => '789 Boulevard Houphouët-Boigny',
                'city' => 'Yamoussoukro',
                'region' => 'Yamoussoukro',
                'emergency_contact_name' => 'Adjoa N\'Guessan',
                'emergency_contact_phone' => '+225 05 67 89 01 24',
                'blood_type' => 'B+',
                'allergies' => [],
                'medical_history' => ['Chirurgie appendice 2019'],
                'insurance_number' => null,
                'is_active' => true
            ],
            [
                'first_name' => 'Fatimata',
                'last_name' => 'Ouattara',
                'email' => 'fatimata.ouattara@email.com',
                'phone' => '+225 09 87 65 43 21',
                'date_of_birth' => '1992-04-18',
                'gender' => 'F',
                'address' => '321 Rue des Bananiers',
                'city' => 'Daloa',
                'region' => 'Daloa',
                'emergency_contact_name' => 'Seydou Ouattara',
                'emergency_contact_phone' => '+225 09 87 65 43 22',
                'blood_type' => 'AB+',
                'allergies' => ['Lactose'],
                'medical_history' => ['Asthme'],
                'insurance_number' => 'INS-11223344',
                'is_active' => true
            ],
            [
                'first_name' => 'Yves',
                'last_name' => 'Kouadio',
                'email' => 'yves.kouadio@email.com',
                'phone' => '+225 02 34 56 78 90',
                'date_of_birth' => '1988-11-30',
                'gender' => 'M',
                'address' => '654 Place de l\'Indépendance',
                'city' => 'San-Pédro',
                'region' => 'San-Pédro',
                'emergency_contact_name' => 'Akissi Kouadio',
                'emergency_contact_phone' => '+225 02 34 56 78 91',
                'blood_type' => 'O-',
                'allergies' => ['Aspirine'],
                'medical_history' => [],
                'insurance_number' => 'INS-55667788',
                'is_active' => false // Patient inactif pour tester les filtres
            ]
        ];

        // Créer les patients spécifiques
        foreach ($specificPatients as $patientData) {
            Patient::create($patientData);
        }

        // Créer 45 patients aléatoires supplémentaires pour avoir 50 au total
        for ($i = 0; $i < 45; $i++) {
            $firstName = $this->getRandomFirstName();
            $lastName = $this->getRandomLastName();
            
            Patient::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => strtolower($firstName . '.' . $lastName . $i . '@email.com'),
                'phone' => '+225 ' . sprintf('%02d %02d %02d %02d %02d', 
                    rand(1, 9), rand(10, 99), rand(10, 99), rand(10, 99), rand(10, 99)),
                'date_of_birth' => $this->getRandomBirthDate(),
                'gender' => rand(0, 1) ? 'M' : 'F',
                'address' => $this->getRandomAddress(),
                'city' => $this->getRandomCity(),
                'region' => $regions[array_rand($regions)],
                'emergency_contact_name' => $this->getRandomFirstName() . ' ' . $this->getRandomLastName(),
                'emergency_contact_phone' => '+225 ' . sprintf('%02d %02d %02d %02d %02d', 
                    rand(1, 9), rand(10, 99), rand(10, 99), rand(10, 99), rand(10, 99)),
                'blood_type' => rand(0, 100) < 80 ? $bloodTypes[array_rand($bloodTypes)] : null,
                'allergies' => $this->getRandomAllergies(),
                'medical_history' => $this->getRandomMedicalHistory(),
                'insurance_number' => rand(0, 100) < 70 ? 'INS-' . sprintf('%08d', rand(10000000, 99999999)) : null,
                'is_active' => rand(0, 100) < 90 // 90% de chance d'être actif
            ]);
        }
    }

    private function getRandomFirstName()
    {
        $names = [
            'Jean', 'Marie', 'Pierre', 'Fatou', 'Kouassi', 'Aïcha', 'Yves', 'Adjoa',
            'Ibrahim', 'Aminata', 'Seydou', 'Mariam', 'Ousmane', 'Kadiatou', 'Mamadou',
            'Fatoumata', 'Bakary', 'Salimata', 'Abdoulaye', 'Rokia', 'Moussa', 'Hawa'
        ];
        return $names[array_rand($names)];
    }

    private function getRandomLastName()
    {
        $names = [
            'Traoré', 'Ouattara', 'Koné', 'Coulibaly', 'Diallo', 'Bamba', 'Touré',
            'N\'Guessan', 'Kouadio', 'Yao', 'Koffi', 'Diabaté', 'Sanogo', 'Doumbia'
        ];
        return $names[array_rand($names)];
    }

    private function getRandomBirthDate()
    {
        $minYear = date('Y') - 80;
        $maxYear = date('Y') - 18;
        $year = rand($minYear, $maxYear);
        $month = rand(1, 12);
        $day = rand(1, 28);
        
        return sprintf('%04d-%02d-%02d', $year, $month, $day);
    }

    private function getRandomAddress()
    {
        $addresses = [
            'Rue des Palmiers', 'Avenue de la République', 'Boulevard Houphouët-Boigny',
            'Rue de la Paix', 'Avenue des Martyrs', 'Place de l\'Indépendance',
            'Rue des Bananiers', 'Boulevard du Commerce', 'Avenue des Fleurs'
        ];
        $number = rand(1, 999);
        return $number . ' ' . $addresses[array_rand($addresses)];
    }

    private function getRandomCity()
    {
        $cities = [
            'Abidjan', 'Bouaké', 'Daloa', 'Yamoussoukro', 'San-Pédro',
            'Korhogo', 'Man', 'Divo', 'Gagnoa', 'Abengourou'
        ];
        return $cities[array_rand($cities)];
    }

    private function getRandomAllergies()
    {
        $allergies = [
            ['Pénicilline'],
            ['Arachides'],
            ['Fruits de mer'],
            ['Lactose'],
            ['Pollen'],
            ['Aspirine'],
            ['Arachides', 'Fruits de mer'],
            []
        ];
        return $allergies[array_rand($allergies)];
    }

    private function getRandomMedicalHistory()
    {
        $history = [
            ['Hypertension'],
            ['Diabète type 2'],
            ['Asthme'],
            ['Chirurgie appendice'],
            ['Fracture jambe'],
            [],
            ['Hypertension', 'Diabète']
        ];
        return $history[array_rand($history)];
    }
}