<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use Marcusmyers\Report\Models\Announcement;

$factory->define(Announcement::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->paragraph,
        'expires_at' => Carbon::now()->addWeeks(2)
    ];
});
