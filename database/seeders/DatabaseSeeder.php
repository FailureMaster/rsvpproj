<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Guest;
use App\Models\Additional;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void{
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'Mike',
            'password' => 'mae',
        ]);

        Guest::factory(50)->create();

    // Create 50 additional guests linked to the primary ones
        Guest::factory(50)->create([
            'is_plus_one' => true, // Mark as plus-one
            'added_by' => fn () => Guest::inRandomOrder()->first()->id,
        ]);
    }
}
