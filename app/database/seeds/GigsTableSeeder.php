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

        $gig = new Gig;
        $gig->fill([
            'name'        => 'The Morning Benders opening for She and Him',
            'description' => 'Live this weekend! Tell your friends!',
            'date'        => '2014-11-09 20:30:00',
            'location'    => 'The Blackheart, ATX',
            'user_id'     => 2,
            ]);
        $gig->forceSave();

        $gig = new Gig;
        $gig->fill([
            'name'        => 'Japanther Live',
            'description' => 'Opening for Fox Trot and The Heebie Jeebies on tour Winter of 2014',
            'date'        => '2014-12-21 21:45:00',
            'location'    => 'The White Rabbit',
            'user_id'     => 5,
            ]);
        $gig->forceSave();

        $gig = new Gig;
        $gig->fill([
            'name'        => 'The Beez Kneez sing-a-long Night',
            'description' => '$15 a the door, $12 if you buy your ticket online at our site! closing up our fall tour -Pass the word along!',
            'date'        => '2014-11-28 19:45:00',
            'location'    => 'Stubb\'s',
            'user_id'     => 7,
            ]);
        $gig->forceSave();

        $gig = new Gig;
        $gig->fill([
            'name'        => 'Jilly and the Beans\' Acoustic Show',
            'description' => '$15 cover -This season\'s kick off show! Be there or be square.',
            'date'        => '2014-12-05 19:30:00',
            'location'    => 'The Ten Eleven',
            'user_id'     => 5,
            ]);
        $gig->forceSave();
        
        $gig = new Gig;
        $gig->fill([
            'name'        => 'The Hawks of Holy Rosary Live and on Tour with Dr. Dog',
            'description' => '$20 cover -purchase ticket\'s at the door or online at The Mohawk website',
            'date'        => '2014-11-22 22:30:00',
            'location'    => 'The Mohawk, ATX',
            'user_id'     => 9,
            ]);
        $gig->forceSave();
    }
}