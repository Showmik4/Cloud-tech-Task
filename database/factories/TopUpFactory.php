<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\TopUp; // Adjust the model namespace as needed
use Carbon\Carbon; // Import the Carbon library for date manipulation

$factory->define(TopUp::class, function (Faker $faker) {
    // Generate a random date within a 3-day period
    $startDate = now()->subDays(3)->timestamp; // Start date is 3 days ago
    $endDate = now()->timestamp; // End date is the current date

    $randomTimestamp = mt_rand($startDate, $endDate);
    $createdAt = Carbon::createFromTimestamp($randomTimestamp);

    return [
        'user_id' => $faker->numberBetween(20,50), // Assuming user IDs range from 1 to 100
        'amount' => $faker->randomFloat(2, 10, 1000), // Generate a random float between 10 and 1000 with 2 decimal places
        'created_at' => $createdAt,
        // Add other fields as needed
    ];
});
