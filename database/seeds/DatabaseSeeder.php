<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users
        DB::table('users')->insert([
            'name' => 'batman',
            'email' => 'batman@gmail.com',
            'password' => 'asdf',
        ]);

        // Meetings
        DB::table('meetings')->insert([
            'alcoholic_id' => 1,
            'patron_id' => 1,
            'date' => '2017-11-27',
            'location' => 'Some cafe',
        ]);

    }
}
