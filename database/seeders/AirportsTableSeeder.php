<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AirportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the airports data from PHP file with array format
        $airports = include database_path('airports_data.php');
        // loop through the airports data
        foreach ($airports as $airport) {
            // Check if the airport already exists
            $existingAirport = \App\Models\Airport::where('iata_code', $airport['iata_code'])->first();
            // If the airport does not exist, create it
            if (! $existingAirport) {
                \App\Models\Airport::create([
                    'iata_code' => $airport['iata_code'],
                    'name' => $airport['name'],
                    'city' => $airport['city'],
                    'country' => $airport['country'] ?? 'Indonesia',
                    'image' => $airport['image'] ?? null,
                ]);
            } else {
                // output what iata_code already exists
                $this->command->info("Airport name: {$existingAirport->name} with IATA code {$airport['iata_code']} already exists.");
            }
        }
        // output success message
        $this->command->info('Airports table seeded successfully!');
        // output the number of records created
        $this->command->info('Number of records created: '.\App\Models\Airport::count());
    }
}
