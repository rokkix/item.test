<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerAdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
       CREATE TRIGGER `add_product` BEFORE INSERT ON `Products` FOR EACH ROW 
            UPDATE `check_cache` SET `data` = 1 WHERE  `check_cache`.`id` =1;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `add_product`');
    }
}
