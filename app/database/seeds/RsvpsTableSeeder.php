<?php

class RsvpsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('rsvps')->delete();

        $rsvps = array(
        	['name' => 'Darin Phelps', 'guests' => 1],
    		['name' => 'Matt Mancuso', 'guests' => 0],
        	['name' => 'Pete Monica', 'guests' => 3],
    		['name' => 'Jeff Soules', 'guests' => 1],
        	['name' => 'Brian Yulke', 'guests' => 1],
    		['name' => 'Krista Hattemer', 'guests' => 1],
        	['name' => 'Brandon Burkhart', 'guests' => 1],
    		['name' => 'Lisa Barnett', 'guests' => 2],
        );

        // Uncomment the below to run the seeder
        DB::table('rsvps')->insert($rsvps);
    }

}