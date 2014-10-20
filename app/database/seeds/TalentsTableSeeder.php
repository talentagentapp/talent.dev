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
                'bio'        => $faker->paragraph($nbSentences = 3),
                'skills'     => $faker->sentence($nbWords = 6),
                'img'        => $faker->imageUrl($width = 300, $height = 300),
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
			]);
		}
	}

}