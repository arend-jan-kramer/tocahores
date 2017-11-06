<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 20);
            // $table->string('email', 60)->unique();
            $table->timestamps();
        });
        DB::table('emails')->insert([
          'id' => 1,
          'email' => 'arend-jan',
          'created_at' => '2017-10-13 10:11:14',
          'updated_at' => '2017-10-13 10:11:14',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}
