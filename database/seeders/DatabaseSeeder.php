<?php

use Database\Seeders\UserSeeder;
use Database\Seeders\EventSeeder;
use Database\Seeders\EventUserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(EventUserSeeder::class);
    }
}
