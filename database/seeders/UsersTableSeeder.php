<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<15;$i++){
            $data[$i] = [
               'name' => $faker->name,
               'email' => $faker->unique()->safeEmail,
               'email_verified_at' => now(),
               'password' => bcrypt('password'),
               'remember_token' => Str::random(10),
               'role' => $input[$rand_keys],
            ];
        }
        
        DB::table(‘users’)->insert($data);
    }
}
