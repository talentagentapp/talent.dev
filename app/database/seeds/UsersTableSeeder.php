<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        $faker = Faker::create();

        foreach(range(1, 25) as $index)
        {
            User::create([
                'talent'     => $faker->boolean($chanceOfGettingTrue = 50),
                'email'      => $faker->unique()->email,
                'username'   => $faker->unique()->userName,
                'password'   => 'password',
                'first'      => $faker->firstName,
                'last'       => $faker->lastName,
                'img'        => $faker->imageUrl($width = 300, $height = 300),
                'experience' => $faker->randomElement($array = ['0-1','1-5','5-10', '10+']),
                'sex'        => $faker->randomElement($array = ['m','f','not say']),
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
            ]);
        }
    }

}