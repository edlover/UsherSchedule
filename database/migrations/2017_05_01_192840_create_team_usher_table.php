<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamUsherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('team_usher', function (Blueprint $table) {

             $table->increments('id');
             $table->timestamps();

             # `team_id` and `tag_id` will be foreign keys, so they have to be unsigned
             #  Note how the field names here correspond to the tables they will connect...
             # `team_id` will reference the `teams table` and `usher_id` will reference the `ushers` table.
             $table->integer('team_id')->unsigned();
             $table->integer('usher_id')->unsigned();

             # Make foreign keys
             $table->foreign('team_id')->references('id')->on('teams');
             $table->foreign('usher_id')->references('id')->on('ushers');
         });
     }

     public function down()
     {
         Schema::drop('team_usher');
     }
}
