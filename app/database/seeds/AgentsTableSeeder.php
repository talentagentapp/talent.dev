<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AgentsTableSeeder extends Seeder
{
	public function run()
	{
        DB::table('agents')->delete();

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Agent::create([
                'company'    => $faker->company,
                'bio'        => $faker->paragraph($nbSentences = 3),
                'img'        => $faker->imageUrl($width = 300, $height = 300),
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
			]);
		}
	}

}