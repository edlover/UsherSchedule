<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Array of services data to add
        $services = [
            ['2017-08-11', '9:30 AM', '', 4],
            ['2017-08-18', '9:30 AM', '', 5],
            ['2017-08-25', '9:30 AM', '', 1],
            ['2017-09-02', '9:30 AM', '', 2],
            ['2017-09-09', '9:30 AM', '', 3],
            ['2017-09-16', '9:30 AM', '', 4],
            ['2017-09-23', '9:30 AM', '', 5],
            ['2017-09-30', '9:30 AM', '', 1],
        ];
        # Initiate a new timestamp we can use for created_at/updated_at fields
        $timestamp = Carbon\Carbon::now()->subDays(count($services));
        # Loop through each service, adding it to the database
        foreach($services as $service) {
            # Set the created_at/updated_at for each service to be one day less than
            # the service before. That way each service will have unique timestamps.
            $timestampForThisService = $timestamp->addDay()->toDateTimeString();
            Service::insert([
                'created_at' => $timestampForThisService,
                'updated_at' => $timestampForThisService,
                'date' => $service[0],
                'time' => $service[1],
                'name' => $service[2],
                'team_id' => $service[3],
            ]);
        }
    }

}
