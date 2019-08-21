<?php

use Illuminate\Database\Seeder;
use App\User;

class DuckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'firstName' =>  'john',
            'lastName' =>  'Doe',
            'quarkName' =>  'johnDoe-Quacker',
            'email' => 'johnDoe@pointless.com',
            'password' => Hash::make('11111111'),
        ]);
    }
}
