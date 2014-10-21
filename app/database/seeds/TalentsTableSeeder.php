<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TalentsTableSeeder extends Seeder
{
	public function run()
	{
        DB::table('talents')->delete();

		$faker = Faker::create();

		foreach(range(1, 15) as $index)
		{
			Talent::create([
                'dob'        => $faker->dateTimeBetween($startDate = '-90 years', $endDate = '-18 years'),
                'skills'     => $faker->sentence($nbWords = 6),
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
			]);
		}
	}

}