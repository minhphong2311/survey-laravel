<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker\Factory::create('ms_MY');
        // Client::create([
        //     'name' => $faker->name,
        //     'ic_number' => '912345031235',
        //     'phone' => $faker->numerify('##########'),
        //     'address' => $faker->address,
        //     'ic_front' => 'https://serving.photos.photobox.com/604750033a2591195db4455e385708c5cefe6a4eee891d90c245b7f66ab6d3374a7f40fa.jpg',
        //     'ic_back' => 'https://serving.photos.photobox.com/61723124db8920d140ab52cf6d3b61eb36b006407ccd51047deb6faf38970e6c66869624.jpg'
        // ]);
        factory(Client::class, 20)->create();
    }
}
