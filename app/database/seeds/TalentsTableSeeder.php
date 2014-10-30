<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TalentsTableSeeder extends Seeder
{
	public function run()
	{
        DB::table('talents')->delete();

        //DEMO SEED ACCOUNT
        $talent = new Talent;
        $talent->fill([
            'dob'        => '1932-02-26',
            'skills'     => 'Guitar playing, songwriting, and singing.',
            'user_id'    => 2,
            ]);
        $talent->forceSave();

        $faker = Faker::create();

        for ($i=0; $i < 15; $i++) {
            $talent = new Talent;
            $talent->fill([
                'dob'        => $faker->dateTimeBetween($startDate = '-90 years', $endDate = '-18 years'),
                'skills'     => $faker->sentence($nbWords = 6),
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                ]);
            $talent->forceSave();
        }

    }
}