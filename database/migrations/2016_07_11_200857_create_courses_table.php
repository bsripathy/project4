<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
	        $table->string('name')->default("");
 	        $table->string('address')->default("");
	        $table->string('city')->default("");
        	$table->string('state')->default(""); 
 			$table->string('zip')->default(""); 
 			$table->string('phone')->default(""); 




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
