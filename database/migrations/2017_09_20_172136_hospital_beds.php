<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\carbon;

class HospitalBeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_beds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('status');
            $table->string('patient_id')->nullable();
            $table->string('department_id');
            $table->string('room');
            $table->timestamps();
        });

        DB::table('hospital_beds')->insert([
          // A01
          ['name' => 'A01b01', 'status' => 0, 'patient_id' => null, 'department_id' => 1, 'room' => 1, 'created_at' => Carbon::now()],
          ['name' => 'A01b02', 'status' => 0, 'patient_id' => null, 'department_id' => 1, 'room' => 1, 'created_at' => Carbon::now()],
          // A02
          ['name' => 'A02b01', 'status' => 0, 'patient_id' => null, 'department_id' => 1, 'room' => 2, 'created_at' => Carbon::now()],
          ['name' => 'A02b02', 'status' => 0, 'patient_id' => null, 'department_id' => 1, 'room' => 2, 'created_at' => Carbon::now()],
          ['name' => 'A02b03', 'status' => 0, 'patient_id' => null, 'department_id' => 1, 'room' => 2, 'created_at' => Carbon::now()],
          ['name' => 'A02b04', 'status' => 0, 'patient_id' => null, 'department_id' => 1, 'room' => 2, 'created_at' => Carbon::now()],
          // A03
          ['name' => 'A03b01', 'status' => 0, 'patient_id' => null, 'department_id' => 1, 'room' => 3, 'created_at' => Carbon::now()],
          ['name' => 'A03b02', 'status' => 0, 'patient_id' => null, 'department_id' => 1, 'room' => 3, 'created_at' => Carbon::now()],
          ['name' => 'A03b03', 'status' => 0, 'patient_id' => null, 'department_id' => 1, 'room' => 3, 'created_at' => Carbon::now()],
          ['name' => 'A03b04', 'status' => 0, 'patient_id' => null, 'department_id' => 1, 'room' => 3, 'created_at' => Carbon::now()],
          // A04
          ['name' => 'A04b01', 'status' => 0, 'patient_id' => null, 'department_id' => 1, 'room' => 4, 'created_at' => Carbon::now()],
          ['name' => 'A04b02', 'status' => 0, 'patient_id' => null, 'department_id' => 1, 'room' => 4, 'created_at' => Carbon::now()],
          ['name' => 'A04b03', 'status' => 0, 'patient_id' => null, 'department_id' => 1, 'room' => 4, 'created_at' => Carbon::now()],
          ['name' => 'A04b04', 'status' => 0, 'patient_id' => null, 'department_id' => 1, 'room' => 4, 'created_at' => Carbon::now()],
          // A05
          ['name' => 'A05b01', 'status' => 0, 'patient_id' => null, 'department_id' => 1, 'room' => 5, 'created_at' => Carbon::now()],
          ['name' => 'A05b02', 'status' => 0, 'patient_id' => null, 'department_id' => 1, 'room' => 5, 'created_at' => Carbon::now()],
          // B01
          ['name' => 'B01b01', 'status' => 0, 'patient_id' => null, 'department_id' => 2, 'room' => 6, 'created_at' => Carbon::now()],
          ['name' => 'B01b02', 'status' => 0, 'patient_id' => null, 'department_id' => 2, 'room' => 6, 'created_at' => Carbon::now()],
          ['name' => 'B01b03', 'status' => 0, 'patient_id' => null, 'department_id' => 2, 'room' => 6, 'created_at' => Carbon::now()],
          ['name' => 'B01b04', 'status' => 0, 'patient_id' => null, 'department_id' => 2, 'room' => 6, 'created_at' => Carbon::now()],
          // B02
          ['name' => 'B02b01', 'status' => 0, 'patient_id' => null, 'department_id' => 2, 'room' => 7, 'created_at' => Carbon::now()],
          ['name' => 'B02b02', 'status' => 0, 'patient_id' => null, 'department_id' => 2, 'room' => 7, 'created_at' => Carbon::now()],
          ['name' => 'B02b03', 'status' => 0, 'patient_id' => null, 'department_id' => 2, 'room' => 7, 'created_at' => Carbon::now()],
          ['name' => 'B02b04', 'status' => 0, 'patient_id' => null, 'department_id' => 2, 'room' => 7, 'created_at' => Carbon::now()],
          // B03
          ['name' => 'B03b01', 'status' => 0, 'patient_id' => null, 'department_id' => 2, 'room' => 8, 'created_at' => Carbon::now()],
          ['name' => 'B03b02', 'status' => 0, 'patient_id' => null, 'department_id' => 2, 'room' => 8, 'created_at' => Carbon::now()],
          ['name' => 'B03b03', 'status' => 0, 'patient_id' => null, 'department_id' => 2, 'room' => 8, 'created_at' => Carbon::now()],
          ['name' => 'B03b04', 'status' => 0, 'patient_id' => null, 'department_id' => 2, 'room' => 8, 'created_at' => Carbon::now()],
          ['name' => 'B03b05', 'status' => 0, 'patient_id' => null, 'department_id' => 2, 'room' => 8, 'created_at' => Carbon::now()],
          ['name' => 'B03b06', 'status' => 0, 'patient_id' => null, 'department_id' => 2, 'room' => 8, 'created_at' => Carbon::now()],
          // B04
          ['name' => 'B04b01', 'status' => 0, 'patient_id' => null, 'department_id' => 2, 'room' => 9, 'created_at' => Carbon::now()],
          ['name' => 'B04b02', 'status' => 0, 'patient_id' => null, 'department_id' => 2, 'room' => 9, 'created_at' => Carbon::now()],
          // C01
          ['name' => 'C01b01', 'status' => 0, 'patient_id' => null, 'department_id' => 3, 'room' => 10, 'created_at' => Carbon::now()],
          ['name' => 'C01b02', 'status' => 0, 'patient_id' => null, 'department_id' => 3, 'room' => 10, 'created_at' => Carbon::now()],
          ['name' => 'C01b03', 'status' => 0, 'patient_id' => null, 'department_id' => 3, 'room' => 10, 'created_at' => Carbon::now()],
          ['name' => 'C01b04', 'status' => 0, 'patient_id' => null, 'department_id' => 3, 'room' => 10, 'created_at' => Carbon::now()],
          // C02
          ['name' => 'C02b01', 'status' => 0, 'patient_id' => null, 'department_id' => 3, 'room' => 11, 'created_at' => Carbon::now()],
          ['name' => 'C02b02', 'status' => 0, 'patient_id' => null, 'department_id' => 3, 'room' => 11, 'created_at' => Carbon::now()],
          ['name' => 'C02b03', 'status' => 0, 'patient_id' => null, 'department_id' => 3, 'room' => 11, 'created_at' => Carbon::now()],
          ['name' => 'C02b04', 'status' => 0, 'patient_id' => null, 'department_id' => 3, 'room' => 11, 'created_at' => Carbon::now()],
          // C03
          ['name' => 'C03b01', 'status' => 0, 'patient_id' => null, 'department_id' => 3, 'room' => 12, 'created_at' => Carbon::now()],
          ['name' => 'C03b02', 'status' => 0, 'patient_id' => null, 'department_id' => 3, 'room' => 12, 'created_at' => Carbon::now()],
          ['name' => 'C03b03', 'status' => 0, 'patient_id' => null, 'department_id' => 3, 'room' => 12, 'created_at' => Carbon::now()],
          ['name' => 'C03b04', 'status' => 0, 'patient_id' => null, 'department_id' => 3, 'room' => 12, 'created_at' => Carbon::now()],
          // D01
          ['name' => 'D01b01', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 13, 'created_at' => Carbon::now()],
          ['name' => 'D01b02', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 13, 'created_at' => Carbon::now()],
          ['name' => 'D01b03', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 13, 'created_at' => Carbon::now()],
          ['name' => 'D01b04', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 13, 'created_at' => Carbon::now()],
          ['name' => 'D01b05', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 13, 'created_at' => Carbon::now()],
          ['name' => 'D01b06', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 13, 'created_at' => Carbon::now()],
          ['name' => 'D01b07', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 13, 'created_at' => Carbon::now()],
          ['name' => 'D01b08', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 13, 'created_at' => Carbon::now()],
          // D02
          ['name' => 'D02b01', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 14, 'created_at' => Carbon::now()],
          ['name' => 'D02b02', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 14, 'created_at' => Carbon::now()],
          ['name' => 'D02b03', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 14, 'created_at' => Carbon::now()],
          ['name' => 'D02b04', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 14, 'created_at' => Carbon::now()],
          // D03
          ['name' => 'D03b01', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 15, 'created_at' => Carbon::now()],
          ['name' => 'D03b02', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 15, 'created_at' => Carbon::now()],
          ['name' => 'D03b03', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 15, 'created_at' => Carbon::now()],
          ['name' => 'D03b04', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 15, 'created_at' => Carbon::now()],
          ['name' => 'D03b05', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 15, 'created_at' => Carbon::now()],
          ['name' => 'D03b06', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 15, 'created_at' => Carbon::now()],
          // D04
          ['name' => 'D04b01', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 16, 'created_at' => Carbon::now()],
          ['name' => 'D04b02', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 16, 'created_at' => Carbon::now()],
          ['name' => 'D04b03', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 16, 'created_at' => Carbon::now()],
          ['name' => 'D04b04', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 16, 'created_at' => Carbon::now()],
          ['name' => 'D04b05', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 16, 'created_at' => Carbon::now()],
          ['name' => 'D04b06', 'status' => 0, 'patient_id' => null, 'department_id' => 4, 'room' => 16, 'created_at' => Carbon::now()],
          // E01
          ['name' => 'E01b01', 'status' => 0, 'patient_id' => null, 'department_id' => 5, 'room' => 17, 'created_at' => Carbon::now()],
          ['name' => 'E01b02', 'status' => 0, 'patient_id' => null, 'department_id' => 5, 'room' => 17, 'created_at' => Carbon::now()],
          ['name' => 'E01b03', 'status' => 0, 'patient_id' => null, 'department_id' => 5, 'room' => 17, 'created_at' => Carbon::now()],
          ['name' => 'E01b04', 'status' => 0, 'patient_id' => null, 'department_id' => 5, 'room' => 17, 'created_at' => Carbon::now()],
          // E02
          ['name' => 'E02b01', 'status' => 0, 'patient_id' => null, 'department_id' => 5, 'room' => 18, 'created_at' => Carbon::now()],
          ['name' => 'E02b02', 'status' => 0, 'patient_id' => null, 'department_id' => 5, 'room' => 18, 'created_at' => Carbon::now()],
          ['name' => 'E02b03', 'status' => 0, 'patient_id' => null, 'department_id' => 5, 'room' => 18, 'created_at' => Carbon::now()],
          ['name' => 'E02b04', 'status' => 0, 'patient_id' => null, 'department_id' => 5, 'room' => 18, 'created_at' => Carbon::now()],
          // E03
          ['name' => 'E03b01', 'status' => 0, 'patient_id' => null, 'department_id' => 5, 'room' => 19, 'created_at' => Carbon::now()],
          ['name' => 'E03b02', 'status' => 0, 'patient_id' => null, 'department_id' => 5, 'room' => 19, 'created_at' => Carbon::now()],
          ['name' => 'E03b03', 'status' => 0, 'patient_id' => null, 'department_id' => 5, 'room' => 19, 'created_at' => Carbon::now()],
          ['name' => 'E03b04', 'status' => 0, 'patient_id' => null, 'department_id' => 5, 'room' => 19, 'created_at' => Carbon::now()],
          // E04
          ['name' => 'E04b01', 'status' => 0, 'patient_id' => null, 'department_id' => 5, 'room' => 20, 'created_at' => Carbon::now()],
          ['name' => 'E04b02', 'status' => 0, 'patient_id' => null, 'department_id' => 5, 'room' => 20, 'created_at' => Carbon::now()],
          // E05
          ['name' => 'E05b01', 'status' => 0, 'patient_id' => null, 'department_id' => 5, 'room' => 21, 'created_at' => Carbon::now()],
          ['name' => 'E05b02', 'status' => 0, 'patient_id' => null, 'department_id' => 5, 'room' => 21, 'created_at' => Carbon::now()],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospital_beds');
    }
}
