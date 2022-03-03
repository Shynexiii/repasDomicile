<?php

namespace Database\Seeders;

use App\Models\Adresse;
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
            'last_name' => $faker->lastName,
            'first_name' => $faker->firstName,
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'phone' => '07' . $faker->randomNumber(8, true),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'last_name' => $faker->lastName,
            'first_name' => $faker->firstName,
            'email' => 'client@client.com',
            'role' => 'client',
            'phone' => '07' . $faker->randomNumber(8, true),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $usersX = User::find([1, 2]);
        foreach ($usersX as $user) {
            $adresse = Adresse::factory()->make();
            $user->adresse()->save($adresse);
        }


        User::factory(5)->create()->each(function ($user) {
            $adresse = Adresse::factory()->make();
            $user->adresse()->save($adresse);
        });
        Plat::factory(10)->create();
    }
}
