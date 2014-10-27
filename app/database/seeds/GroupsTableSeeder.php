<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GroupsTableSeeder extends Seeder
{
	public function run()
	{
        DB::table('groups')->delete();

        $faker = Faker::create();

        for ($i=0; $i < 5; $i++) {
            $group = new Group;
            $group->fill([
                'name'        => $faker->word,
                'description' => $faker->paragraph($nbSentences = 3),
                'img'         => $faker->imageUrl($width = 640, $height = 480),
                'created_at'  => $faker->dateTimeThisYear($max = 'now'),
                ]);
            $group->forceSave();
        }
    }
}