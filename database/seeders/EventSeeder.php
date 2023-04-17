<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $userCount = DB::table('users')->count();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('events')->insert([
                'title' => $faker->sentence(),
                'description' => $faker->paragraph(),
                'location' => $faker->address(),
                'date' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d H:i:s'),
                'user_id' => $faker->numberBetween(1, $userCount),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
