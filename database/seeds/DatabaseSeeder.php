<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TeamsTableSeeder::class);
        $this->call(UshersTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(TeamUsherTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
