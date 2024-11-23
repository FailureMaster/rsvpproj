<?php

namespace Database\Factories;

use App\Models\Guest;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guest>
 */
class GuestFactory extends Factory
{
    protected $model = Guest::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName'         => $this->faker->unique()->firstName,
            'lastName'          => $this->faker->unique()->lastName,
            'code'              => $this->generateUniqueCode(),
            'relationship'      => $this->faker->randomElement(['Friend', 'Family', 'Colleague', 'Other']),
            'role'              => $this->faker->randomElement(['Guest', 'Flower Girl', 'Ring Bearer', 'Groomsman', 'Bridesmaid']),
            'is_plus_one'       => $this->faker->boolean(30), // 30% chance of being a plus-one
            'added_by'          => $this->getRandomGuestId(), // Either null or an existing guest ID
            'is_coming'         => $this->faker->boolean(70), // 70% chance of being true
            'did_come'          => $this->faker->boolean(50), // 50% chance of attending
        ];
    }

    private function generateUniqueCode()
    {
        do {
            $code = strtoupper(Str::random(6));
        } while (Guest::where('code', $code)->exists());

        return $code;
    }

    private function getRandomGuestId(): ?int
    {
        // Retrieve an existing guest ID or return null if no guests exist
        $guest = Guest::inRandomOrder()->first();

        return $guest ? $guest->id : null;
    }
}
