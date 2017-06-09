<?php

use Illuminate\Database\Seeder;
use App\Service;
use App\Usher;

class ServiceUsherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {

         # First, create an array of all the services we want to associate teams with
         # The *key* will be the service date, and the *value* will be an the team.
         $services =[
             '2017-04-02' => 'Team 1',
             '2017-04-09' => 'Team 2',
             '2017-04-16' => 'Team 3',
             '2017-04-23' => 'Team 4',
             '2017-04-30' => 'Team 5',
             '2017-05-07' => 'Team 1',
             '2017-05-14' => 'Team 2',
             '2017-05-21' => 'Team 3',
         ];

         # Now loop through the above array, creating a new pivot for each service to usher team
         foreach($services as $date => $ushers) {

             # First get the service
             $service = Service::where('date','=',$date);

             $usher = Usher::where('team_id', '=', $service=>team_id);

             # $ushers = Usher::where('team','=',$teams);

             # Connect this team to this service
             $service->ushers()->save($usher);
        }
    }
}
