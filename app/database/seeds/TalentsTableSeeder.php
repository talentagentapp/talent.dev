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

        $talent = new Talent;
        $talent->fill([
            'dob'        => '1926-09-23',
            'skills'     => 'Jazz saxophone.',
            'user_id'    => 3,
            ]);
        $talent->forceSave();

        $talent = new Talent;
        $talent->fill([
            'dob'        => '1985-06-21',
            'skills'     => 'Singing and songwriting.',
            'user_id'    => 4,
            ]);
        $talent->forceSave();

        $talent = new Talent;
        $talent->fill([
            'dob'        => '1915-10-10',
            'skills'     => 'Acting and playwrighting.',
            'user_id'    => 5,
            ]);
        $talent->forceSave();


        $faker = Faker::create();

        for ($i=0; $i < 10; $i++) {
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