<?php

use Illuminate\Database\Seeder;
use App\Team;
use App\Usher;

class TeamUsherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {

         # First, create an array of all the teams we want to associate ushers with
         # The *key* will be the team name, and the *value* will be an array of ushers last names.
         $teams =[
             'Team 1' => ['Prezuhy','Long','Champlin','Beaumont'],
             'Team 2' => ['Givnish','Byrnes','Patram','Mangan', 'Dunlap'],
             'Team 3' => ['Rusnak','Bonner','Richards','Mulroy'],
             'Team 4' => ['Casey','Sangston','Sisson','Stinson', 'Miller'],
             'Team 5' => ['Kriebel','Steinbauer','Wertz','Unangst'],
         ];

         # Now loop through the above array, creating a new pivot for each team to usher
         foreach($teams as $team_name => $ushers) {

             # First get the book
             $team = Team::where('team_name','like',$team_name)->first();

             # Now loop through each last name for this team, adding the pivot
             foreach($ushers as $lastName) {
                 $usher = Usher::where('last_name','LIKE',$lastName)->first();

                 # Connect this usher to this team
                 $team->ushers()->save($usher);
             }
         }
     }
}
