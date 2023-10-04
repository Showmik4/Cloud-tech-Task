<?php

use App\TopUp;
use Illuminate\Database\Seeder;

class TopUpSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TopUp::class, 500)->create();
    }
}
