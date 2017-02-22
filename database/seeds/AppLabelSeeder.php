<?php

use Illuminate\Database\Seeder;

class AppLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      $numOfLabels = 5;
      factory( \App\Label::class, $numOfLabels )->create();
    }
}
