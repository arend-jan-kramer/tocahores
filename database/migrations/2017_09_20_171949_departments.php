<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\carbon;

class Departments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('short_name');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('min_age')->nullable();
        });

        DB::table('departments')->insert([
          ['short_name' => 'A', 'name' => 'chirurgie', 'description' => null , 'min_age' => null],
          ['short_name' => 'B', 'name' => 'neurochirurgie', 'description' => null, 'min_age' => null],
          ['short_name' => 'C', 'name' => 'verloskunde', 'description' => null, 'min_age' => null],
          ['short_name' => 'D', 'name' => 'kindergeneeskunde',  'description' => 'Let op tot 14 jaar!', 'min_age' => 14],
          ['short_name' => 'E', 'name' => 'intensive care', 'description' => null, 'min_age' => null],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
