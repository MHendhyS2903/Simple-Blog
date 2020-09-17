<?php

use Illuminate\Database\Seeder;
use App\Label;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $faker = Faker\Factory::create();
        $limit = 20;
        $gender = $faker->randomElement(['Pria', 'Wanita']);

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([ 
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => $faker->password,
                'jenis_kelamin' => $gender,
                'alamat' => $faker->address,
                'status' => 0,
            ]);
        }

        for ($i = 0; $i < $limit; $i++) {
            DB::table('label')->insert([ 
                'nama' => $faker->word,
            ]);
        }

        $kategori = Label::all()->pluck('labelID')->toArray();
        $user = User::all()->pluck('id')->toArray();

        for ($i = 0; $i < $limit; $i++) {
            DB::table('post')->insert([ 
                'judul' => $faker->title,
                'konten' => $faker->text,
                'labelID' => $faker->randomElement($kategori),
                'id' => $faker->randomElement($user),
                'foto' => 'contact-bg.jpg',
            ]);
        }

    }
}
