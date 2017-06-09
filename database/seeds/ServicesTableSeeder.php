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
            ['2017-04-02', '9:30 AM', '', 1],
            ['2017-04-09', '9:30 AM', 'Palm Sunday', 2],
            ['2017-04-16', '9:30 AM', 'Easter Sunday', 3],
            ['2017-04-23', '9:30 AM', '', 4],
            ['2017-04-30', '9:30 AM', '', 5],
            ['2017-05-07', '9:30 AM', '', 1],
            ['2017-05-14', '9:30 AM', '', 2],
            ['2017-05-21', '9:30 AM', '', 3],
            ['2017-05-28', '9:30 AM', '', 4],
            ['2017-06-04', '9:30 AM', '', 5],
            ['2017-06-11', '9:30 AM', '', 1],
            ['2017-06-18', '9:30 AM', '', 2],
            ['2017-06-25', '9:30 AM', '', 3],
            ['2017-07-02', '9:30 AM', '', 4],
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
