<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GigsTableSeeder extends Seeder
{
	public function run()
	{
        DB::table('gigs')->delete();

        $gig = new Gig;
        $gig->fill([
            'name'        => 'Codeup Demo Day',
            'description' => 'This free event is for people who want to hire a web developer for permanent, contract, or freelance work. We’ll have 12 developers on hand who have gone through over 700 hours of training during the past 3 months at Codeup.',
            'date'        => '2014-11-05 15:30:00',
            'location'    => 'Pearl Brewery',
            'user_id'     => 1,
            ]);
        $gig->forceSave();

        $faker = Faker::create();

        for ($i=0; $i < 5; $i++) {
            $gig = new Gig;
            $gig->fill([
                'name'        => $faker->bs,
                'description' => $faker->paragraph($nbSentences = 5),
                'date'        => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 month'),
                'location'    => $faker->address,
                'created_at'  => $faker->dateTimeThisYear($max = 'now'),
                'user_id'     => $faker->numberBetween($min = 1, $max = 12)
                ]);
            $gig->forceSave();
        }
    }
}