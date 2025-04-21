<?php

namespace Database\Seeders;

use App\Models\Medicine;
use App\Models\Vaccine;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class VaccineMedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Buat data untuk vaksin dan obat
        for ($i = 0; $i < 15; $i++) {
            Vaccine::create([
                'vaccine_name' => $faker->randomElement(['BCG', 'Hepatitis B', 'Polio', 'DTP', 'Hib', 'Campak', 'MR']),
                'unit' => $faker->randomElement(['vial', 'dosis']),
                'stock' => $faker->numberBetween(10, 100),
                'entry_date' => $faker->dateTimeBetween('2023-01-01', '2024-12-31')->format('Y-m-d'),
                'expiry_date' => $faker->dateTimeBetween('2025-01-01', '2026-12-31')->format('Y-m-d'),
                'notes' => $faker->sentence(),
            ]);

            // Nama-nama obat
            $medicineName = $faker->randomElement(
                [
                    'Paracetamol',
                    'Ambroxol',
                    'Cetirizine',
                    'Ferrous Sulfate',
                    'Cefadroxil',
                    'Vitamin A',
                    'Vitamin B12',
                    'Amoxicillin',
                    'Ibuprofen',
                    'Omeprazole'
                ]
            );

            // Menentukan kategori dan unit berdasarkan nama obat
            if (strpos($medicineName, 'Vitamin') !== false) {
                // Memeriksa apakah obat tersebut adalah vaksin
                if (strpos($medicineName, 'Vaksin') !== false) {
                    $medicineType = 'Vaksin';  // Jika nama obat mengandung 'Vaksin'
                    $medicineUnit = $faker->randomElement(['ampul', 'vial', 'suntikan']);  // Unit untuk vaksin
                } else {
                    $medicineType = 'Suplemen';  // Jika nama obat mengandung 'Vitamin'
                    $medicineUnit = $faker->randomElement(['pcs', 'tablet', 'strip']);  // Unit yang sesuai untuk vitamin
                }
            } elseif (in_array($medicineName, ['Cefadroxil', 'Amoxicillin', 'Ibuprofen', 'Omeprazole'])) {
                $medicineType = 'Antibiotik'; // Untuk antibiotik
                $medicineUnit = $faker->randomElement(['tablet', 'capsule', 'strip']);  // Unit antibiotik
            } elseif (in_array($medicineName, ['Paracetamol', 'Ambroxol', 'Cetirizine', 'Ferrous Sulfate'])) {
                $medicineType = 'Lainnya';  // Nama-nama ini dianggap sebagai 'Obat'
                $medicineUnit = $faker->randomElement(['tablet', 'capsule', 'pcs']);  // Unit umum untuk obat lainnya
            } else {
                $medicineType = 'Lainnya';  // Default jika tidak sesuai
                $medicineUnit = $faker->randomElement(['tablet', 'capsule', 'pcs']);
            }

            // Menambahkan data ke database
            Medicine::create([
                'medicine_name' => $medicineName,
                'type' => $medicineType,
                'unit' => $medicineUnit,
                'stock' => $faker->numberBetween(10, 100),
                'entry_date' => $faker->dateTimeBetween('2023-01-01', '2024-12-31')->format('Y-m-d'),
                'expiry_date' => $faker->dateTimeBetween('2025-01-01', '2026-12-31')->format('Y-m-d'),
                'notes' => $faker->sentence(),
            ]);
        }
    }
}
