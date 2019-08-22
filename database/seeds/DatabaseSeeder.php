<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create()->each(function ($user) {
            for ($n = 0; $n < rand(1, 3); $n++) {
                $user->quacks()->save(factory(App\Quack::class)->make());
                $user->comments()->save(factory(\App\Comment::class)->make());
            }

        });
    }
}
