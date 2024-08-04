<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MemberFactory extends Factory
{
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name_bangla' => $this->faker->name,
            'name_english' => $this->faker->name,
            'image_path' => null,
            'upazilla' => $this->faker->city,
            'profession' => $this->faker->jobTitle,
            'blood_group' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'school_name' => $this->faker->company,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'present_address' => $this->faker->address,
            'permanent_address' => $this->faker->address,
            'fb_url' => $this->faker->url,
            'reference' => $this->faker->name,
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'status' => $this->faker->randomElement(['pending', 'approved']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
