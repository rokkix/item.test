<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
       CREATE TRIGGER `test` BEFORE UPDATE ON `Products` FOR EACH ROW 
            UPDATE `test.item`.`check_cache` SET `data` = 1 WHERE `test`.`id` = 1
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
