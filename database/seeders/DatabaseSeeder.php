<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Plat;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        DB::table('users')->insert([
            'name' => $faker->name(),
            'username' => 'demo',
            'email' => $faker->email,
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        User::factory(4)->create();
        Plat::factory(10)->create();
    }
}
