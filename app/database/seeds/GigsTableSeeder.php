<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GigsTableSeeder extends Seeder
{
	public function run()
	{
        DB::table('gigs')->delete();

        $faker = Faker::create();

        for ($i=0; $i < 5; $i++) {
            $gig = new Gig;
            $gig->fill([
                'name'        => $faker->bs,
                'description' => $faker->paragraph($nbSentences = 3),
                'date'        => $faker->dateTimeBetween($startDate = 'now', $endDate = '+3 years'),
                'location'    => $faker->address,
                'created_at'  => $faker->dateTimeThisYear($max = 'now')
                ]);
            $gig->forceSave();
        }
    }
}