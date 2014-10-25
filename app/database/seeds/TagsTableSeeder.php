<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tags')->delete();

        $faker = Faker::create();

        for ($i=0; $i < 10; $i++) {
            $tag = new Tag;
            $tag->fill([
                'tag' => $faker->word
                ]);
            $tag->forceSave();
        }
    }
}