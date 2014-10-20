<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GigsTableSeeder extends Seeder
{
	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 5) as $index)
		{
			Gig::create([
                'name'        => $faker->bs,
                'gig_desc'    => $faker->paragraph($nbSentences = 3),
                'gig_date'    => $faker->dateTimeBetween($startDate = 'now', $endDate = '+3 years'),
                'location'    => $faker->address,
                'created_at'  => $faker->dateTimeThisYear($max = 'now')
			]);
		}
	}

}