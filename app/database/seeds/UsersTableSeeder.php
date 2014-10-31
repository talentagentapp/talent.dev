<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        //CREATE THE FAKER
        $faker = Faker::create();

        //SEED THE ADMIN ACCOUNT
        $user = new User;
        $user->fill([
            //USER ID:1
            'role'       => 'admin',
            'email'      => 'admin@codeup.com',
            'username'   => 'admin',
            'password'   => 'adminPass',
            'first'      => 'Code',
            'last'       => 'Up',
            'img'        => '/img/jessie_mathews.jpg',
            'bio'        => 'I am the administrator.',
            'experience' => '10+',
            'sex'        => 'm',
            ]);
        $user->forceSave();

        //SEED THE DEMO ACCOUNTS
        $user = new User;
        $user->fill([
            //USER ID:2
            'role'       => 'talent',
            'email'      => 'johnny@cash.com',
            'username'   => 'theManInBlack',
            'password'   => 'demoPass',
            'first'      => 'Johnny',
            'last'       => 'Cash',
            'img'        => '/img/johnny_cash_1.jpg',
            'bio'        => 'I was born in Kingsland, Arkansas and I love writing, playing music and walking the line.',
            'experience' => '10+',
            'sex'        => 'm',
            // 'talent_id'  => 1,
            ]);
        $user->forceSave();

        $user = new User;
        $user->fill([
            //USER ID:3
            'role'       => 'talent',
            'email'      => 'john@coltrane.com',
            'username'   => 'coltraneInMaine',
            'password'   => 'demoPass',
            'first'      => 'John',
            'last'       => 'Coltrane',
            'img'        => '/img/john_coltrane_1.jpg',
            'bio'        => 'I helped pioneer the use of modes in jazz and was later at the forefront of free jazz.',
            'experience' => '10+',
            'sex'        => 'm',
            // 'talent_id'  => 2,
            ]);
        $user->forceSave();

        $user = new User;
        $user->fill([
            //USER ID:4
            'role'       => 'talent',
            'email'      => 'lana@sadgirl.com',
            'username'   => 'redDressGirl',
            'password'   => 'demoPass',
            'first'      => 'LanaDel',
            'last'       => 'Ray',
            'img'        => '/img/lana_del_ray_1.jpg',
            'bio'        => 'I am a self-styled gangsta Nancy Sinatra.',
            'experience' => '1-5',
            'sex'        => 'f',
            // 'talent_id'  => 4,
            ]);
        $user->forceSave();

        $user = new User;
        $user->fill([
            //USER ID:5
            'role'       => 'talent',
            'email'      => 'orson@greenpeas.com',
            'username'   => 'rosebud',
            'password'   => 'demoPass',
            'first'      => 'Orson',
            'last'       => 'Wells',
            'img'        => '/img/orson_wells_1.jpg',
            'bio'        => 'I am a great actor.',
            'experience' => '10+',
            'sex'        => 'm',
            // 'talent_id'  => 5,
            ]);
        $user->forceSave();



        //SEED THE DATABASE
        for ($i=0; $i < 15; $i++) {
            $user = new User;
            $user->fill([
                'role'       => $faker->randomElement($array =['talent', 'agent']),
                'email'      => $faker->unique()->email,
                'username'   => $faker->unique()->userName,
                'password'   => $faker->word,
                'first'      => $faker->firstName,
                'last'       => $faker->lastName,
                'img'        => $faker->imageUrl($width = 300, $height = 300),
                'bio'        => $faker->paragraph($nbSentences = 3),
                'experience' => $faker->randomElement($array = ['0-1','1-5','5-10', '10+']),
                'sex'        => $faker->randomElement($array = ['m','f','not say']),
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                ]);
            $user->forceSave();
        }
    }

}