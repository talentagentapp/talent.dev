<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        //SEED THE ADMIN ACCOUNT
        $user = new User;
        $user->fill([
            'role'       => 'admin',
            'email'      => 'admin@codeup.com',
            'username'   => 'admin',
            'password'   => 'adminPass',
            'first'      => 'Code',
            'last'       => 'Up',
            'img'        => '/img/jessie_mathews.jpg',
            'bio'        => 'BEWARE THE ADMINISTRATOR AND BANHAMMER.',
            'experience' => '10+',
            'sex'        => 'm',
            ]);
        $user->forceSave();

        //CREATE THE FAKER
        $faker = Faker::create();

        //SEED THE DATABASE
        for ($i=0; $i < 25; $i++) {
            $user = new User;
            $user->fill([
                'role'       => $faker->randomElement($array =['talent', 'agent']),
                'email'      => $faker->unique()->email,
                'username'   => $faker->unique()->userName,
                'password'   => $faker->word,
                'first'      => $faker->firstName,
                'last'       => $faker->lastName,
                'img'        => $faker->imageUrl($width = 250, $height = 250),
                'bio'        => $faker->paragraph($nbSentences = 3),
                'experience' => $faker->randomElement($array = ['0-1','1-5','5-10', '10+']),
                'sex'        => $faker->randomElement($array = ['m','f','not say']),
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                ]);
            $user->forceSave();
        }
    }

}