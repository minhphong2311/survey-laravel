<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ms_MY');
        User::truncate();
        User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('hYVFo3n0*rJ34TT2LV@j'),
            'active' => true,
            'level' => 'Superadmin',
            'email_verified_at' => now(),
            'job_title' => $faker->jobTitle,
            'ic_number' => $faker->numerify('############'),
            'phone' => $faker->numerify('##########'),
            'address' => $faker->address,
            'remember_token' => Str::random(10),
        ]);
        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('IfoCpLOr#$'),
        //     'active' => true,
        //     'level' => 'Admin',
        //     'email_verified_at' => now(),
        //     'job_title' => $faker->jobTitle,
        //     'ic_number' => $faker->numerify('############'),
        //     'phone' => $faker->numerify('##########'),
        //     'address' => $faker->address,
        //     'remember_token' => Str::random(10),
        // ]);
        // User::create([
        //     'name' => 'staff',
        //     'email' => 'staff@gmail.com',
        //     'password' => Hash::make(Str::random(10)),
        //     'active' => true,
        //     'level' => 'Staff',
        //     'email_verified_at' => now(),
        //     'job_title' => $faker->jobTitle,
        //     'ic_number' => '912345031234',
        //     'phone' => '0123456789',
        //     'address' => $faker->address,
        //     'remember_token' => Str::random(10),
        // ]);
        // factory(User::class, 10)->create();
    }
}
