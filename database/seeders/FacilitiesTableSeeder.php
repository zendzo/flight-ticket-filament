<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
          ['name' => 'Baggage', 'description' => 'Free Baggage Allowance'],
          ['name' => 'Entertainment', 'description' => 'In-flight Entertainment'],
          ['name' => 'USB C and Port', 'description' => 'USB C and Port'],
          ['name' => 'Wi-Fi Onboard', 'description' => 'Wi-Fi Onboard'],
          ['name' => 'Heavy Meals', 'description' => 'Heavy Meals'],
        ];

        foreach ($facilities as $facility) {
            \App\Models\Facility::create([
                'name' => $facility['name'],
                'description' => $facility['description'],
            ]);
        }
        $this->command->info('Facilities table seeded!');
    }
}
