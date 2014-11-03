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
            'email'      => 'Jessica@email.com',
            'username'   => 'jessieGirl',
            'password'   => 'demoPass',
            'first'      => 'Jessica',
            'last'       => 'Lucas',
            'img'        => '/img/girl_1.jpg',
            'bio'        => 'I am from California and now reside in San Antonio. I have been playing piano since I was young.',
            'experience' => '5-10',
            'sex'        => 'f',
            // 'talent_id'  => 3,
            ]);
        $user->forceSave();

        $user = new User;
        $user->fill([
            //USER ID:5
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
            //USER ID:6
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


        $user = new User;
        $user->fill([
            //USER ID:6
            'role'       => 'talent',
            'email'      => 'audreyelopez@gmail.com',
            'username'   => 'Audrey_elle',
            'password'   => 'demoPass',
            'first'      => 'Audrey',
            'last'       => 'Lopez',
            'img'        => '/img/audrey_1.jpg',
            'bio'        => 'I .',
            'experience' => '10+',
            'sex'        => 'f',
            // 'talent_id'  => 5,
            ]);
        $user->forceSave();


        $user = new User;
        $user->fill([
            //USER ID:6
            'role'       => 'talent',
            'email'      => 'adam.j.vega@hotmail.com',
            'username'   => 'adamTheAtom',
            'password'   => 'demoPass',
            'first'      => 'Adam',
            'last'       => 'Vega',
            'img'        => '/img/adam_1.jpg',
            'bio'        => 'I .',
            'experience' => '1-5',
            'sex'        => 'm',
            // 'talent_id'  => 5,
            ]);
        $user->forceSave();


        $user = new User;
        $user->fill([
            //USER ID:6
            'role'       => 'talent',
            'email'      => 'coreyreylp@gmail.com',
            'username'   => 'coray',
            'password'   => 'demoPass',
            'first'      => 'Cory',
            'last'       => 'Rodriguez',
            'img'        => '/img/cory_1.jpg',
            'bio'        => 'I am a web developer.',
            'experience' => '1-5',
            'sex'        => 'm',
            // 'talent_id'  => 5,
            ]);
        $user->forceSave();


        $user = new User;
        $user->fill([
            //USER ID:7
            'role'       => 'agent',
            'email'      => 'jacob@email.com',
            'username'   => 'jakesTown',
            'password'   => 'demoPass',
            'first'      => 'Jacob',
            'last'       => 'Hernandez',
            'img'        => '/img/man_2.jpg',
            'bio'        => 'I am a agent that specializes in helping young, talented people.',
            'experience' => '1-5',
            'sex'        => 'm',
            // 'agent_id'  => 1,
            ]);
        $user->forceSave();


        $user = new User;
        $user->fill([
            //USER ID:7
            'role'       => 'talent',
            'email'      => 'ClarenceSStrong@rhyta.com',
            'username'   => 'Tinte1991',
            'password'   => 'demoPass',
            'first'      => 'Clarence',
            'last'       => 'Strong',
            'img'        => '/img/man_1.jpg',
            'bio'        => 'I am a guitar player, specializing in rock.',
            'experience' => '1-5',
            'sex'        => 'm',
            // 'agent_id'  => 1,
            ]);
        $user->forceSave();


        $user = new User;
        $user->fill([
            //USER ID:7
            'role'       => 'agent',
            'email'      => 'FelicitaBToomer@armyspy.com',
            'username'   => 'Aily1950',
            'password'   => 'demoPass',
            'first'      => 'Felicita',
            'last'       => 'Toomer',
            'img'        => '/img/girl_2.jpg',
            'bio'        => 'I am a manager just starting my career.',
            'experience' => '0-1',
            'sex'        => 'f',
            // 'agent_id'  => 1,
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
                'img'        => $faker->imageUrl($width = 300, $height = 300, 'people'),
                'bio'        => $faker->paragraph($nbSentences = 3),
                'experience' => $faker->randomElement($array = ['0-1','1-5','5-10', '10+']),
                'sex'        => $faker->randomElement($array = ['m','f','not say']),
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                ]);
            $user->forceSave();
        }
    }

}