<?php

use Illuminate\Database\Seeder;

class HospitalBedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(App\Hospitals_bed::class, 5)->create();
    }
}
