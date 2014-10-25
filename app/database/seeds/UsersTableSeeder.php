<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        $user = User::create([
            'role'       => 'admin',
            'email'      => 'admin@codeup.com',
            'username'   => 'admin',
            'password'   => 'adminPass',
            'first'      => 'Code',
            'last'       => 'Up',
            'img'        => '/img/jessie_mathews.jpg',
            'bio'        => 'BEWARE THE ADMINISTRATOR AND BANHAMMER'
            'experience' => 'I attended admin school.'
            'sex'        => 'm'
            ]);

        $faker = Faker::create();

        foreach(range(1, 25) as $index)
        {
            User::create([
                'role'       => $faker->randomElement($array =['talent', 'agent', 'admin']),
                'email'      => $faker->unique()->email,
                'username'   => $faker->unique()->userName,
                'password'   => 'password',
                'first'      => $faker->firstName,
                'last'       => $faker->lastName,
                'img'        => $faker->imageUrl($width = 300, $height = 300),
                'bio'        => $faker->paragraph($nbSentences = 3),
                'experience' => $faker->randomElement($array = ['0-1','1-5','5-10', '10+']),
                'sex'        => $faker->randomElement($array = ['m','f','not say']),
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                ]);
        }
    }

}