<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder
{
	public function run()
	{
        DB::table('tags')->delete();

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Tag::create([
                'tag' => $faker->word
			]);
		}
	}

}