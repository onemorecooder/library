<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EventUserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Obtener todos los IDs de libros y categorías
        $eventIds = DB::table('events')->pluck('id');
        $userIds = DB::table('users')->pluck('id');

        foreach ($eventIds as $eventId) {
            // Seleccionar entre 1 y 3 categorías aleatorias
            $numEvents = $faker->numberBetween(1, 3);
            $selectedEvents = $faker->randomElements($userIds->toArray(), $numEvents);

            // Insertar registros en la tabla pivot
            foreach ($selectedEvents as $userId) {
                DB::table('user_events_attendees')->insert([
                    'event_id' => $eventId,
                    'user_id' => $userId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
