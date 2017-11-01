<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('department_id');
            $table->string('name');
            $table->string('status');
            $table->string('description');
            $table->string('x_bed');
            $table->timestamps();
        });

        DB::table('rooms')->insert([
          ['department_id' => 1,'name' => 'A01', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 2],
          ['department_id' => 1,'name' => 'A02', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 4],
          ['department_id' => 1,'name' => 'A03', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 4],
          ['department_id' => 1,'name' => 'A04', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 4],
          ['department_id' => 1,'name' => 'A05', 'status' => 0, 'description' => 'uitslaapkamer','x_bed' => 2],
          ['department_id' => 2,'name' => 'B01', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 4],
          ['department_id' => 2,'name' => 'B02', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 4],
          ['department_id' => 2,'name' => 'B03', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 6],
          ['department_id' => 2,'name' => 'B04', 'status' => 0, 'description' => 'uitslaapkamer','x_bed' => 2],
          ['department_id' => 3,'name' => 'C01', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 4],
          ['department_id' => 3,'name' => 'C02', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 4],
          ['department_id' => 3,'name' => 'C03', 'status' => 0, 'description' => 'intensieve zorg','x_bed' => 4],
          ['department_id' => 4,'name' => 'D01', 'status' => 0, 'description' => 'intensieve zorg','x_bed' => 8],
          ['department_id' => 4,'name' => 'D02', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 4],
          ['department_id' => 4,'name' => 'D03', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 6],
          ['department_id' => 4,'name' => 'D04', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 6],
          ['department_id' => 5,'name' => 'E01', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 4],
          ['department_id' => 5,'name' => 'E02', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 4],
          ['department_id' => 5,'name' => 'E03', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 4],
          ['department_id' => 5,'name' => 'E04', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 2],
          ['department_id' => 5,'name' => 'E05', 'status' => 0, 'description' => 'opnamenkamer','x_bed' => 2],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
