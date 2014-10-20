<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('comments')->delete();

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Comment::create([
                'rating'     => $faker->randomElement($array = [1, 2, 3, 4, 5]),
                'comment'    => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'created_at' => $faker->dateTimeThisYear($max = 'now')
			]);
		}
	}

}