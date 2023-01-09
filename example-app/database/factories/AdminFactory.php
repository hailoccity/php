<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class AdminFactory extends Factory
{
    protected $model = Admin::class;
    public function definition()
    {
        return [
            'username' => fake()->name(),
            'password' => '12345678', // password
            'phone' => fake()->phoneNumber(10),
        ];
    }
}
