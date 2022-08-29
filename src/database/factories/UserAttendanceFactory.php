<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserAttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 20),
            'attendance_id' => $this->faker->numberBetween(1, 4),
            'date' => $this->faker->dateTimeBetween($startDate = '-4 week', $endDate = 'now')->format('Y-m-d'),
        ];
    }
}
