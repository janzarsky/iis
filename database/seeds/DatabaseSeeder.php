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
            'name' => 'alcoholic',
            'email' => 'alcoholic@example.org',
            'password' => 'asdf',
            'is_alcoholic' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'patron',
            'email' => 'patron@example.org',
            'password' => 'asdf',
            'is_patron' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'specialist',
            'email' => 'specialist@example.org',
            'password' => 'asdf',
            'is_specialist' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.org',
            'password' => 'asdf',
            'is_admin' => true,
        ]);

        // Meetings
        DB::table('meetings')->insert([
            'alcoholic_id' => 1,
            'patron_id' => 1,
            'date' => '2017-11-27',
            'location' => 'Some cafe',
            'patron_ack' => true,
        ]);

    }
}
