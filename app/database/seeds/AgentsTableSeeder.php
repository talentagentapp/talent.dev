<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AgentsTableSeeder extends Seeder
{
	public function run()
	{
        DB::table('agents')->delete();

        $faker = Faker::create();

        for ($i=0; $i < 5; $i++) {
            $agent = new Agent;
            $agent->fill([
                'company'    => $faker->company,
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                ]);
            $agent->forceSave();
        }
    }
}