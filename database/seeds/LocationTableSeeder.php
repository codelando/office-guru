<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$services = App\Service::all();

        factory(App\Location::class, 30)
        	->create()
        	->each(function($location) use ($services) {
        		$location->services()->attach(
        			$services->random(rand(1, 10))->pluck('id')->toArray()
    			);
			});
	}
}
