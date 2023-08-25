<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $faker = \Faker\Factory::create('pt_BR');
        $countryIds = DB::table('countries')->pluck('id');

        return [
            'name' => $faker->firstName(),
            'surname' => $faker->lastName(),
            'nickname' => $faker->unique()->randomNumber(),
            'email' => $faker->unique()->safeEmail(),
            'country_id' => $faker->randomElement($countryIds),
            'phone' => $faker->unique()->phoneNumber(),
            'highlight' => $faker->numberBetween(0, 5),
            'sugar_daddy' => $faker->boolean(),
            'sugar_mommy' => $faker->boolean(),
            'submissive' => $faker->boolean(),
            'sugar_daddy' => $faker->boolean(),
            'bondage' => $faker->boolean(),
            'cuckold' => $faker->boolean(),
            'podolatry' => $faker->boolean(),
            'thresome' => $faker->boolean(),
            'active' => $faker->boolean(),
            'avatar' => 'https://via.placeholder.com/640x480.png',
            'email_verified_at' => now(),
            'last_activity' => $faker->dateTime(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
