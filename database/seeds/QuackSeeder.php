<?php

use App\Quack;
use Illuminate\Database\Seeder;

class QuackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Quack::class, 10)->create()->make();
    }
}
