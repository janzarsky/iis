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
            'password' => Hash::make('asdf'),
            'is_alcoholic' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'patron',
            'email' => 'patron@example.org',
            'password' => Hash::make('asdf'),
            'is_patron' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'specialist',
            'email' => 'specialist@example.org',
            'password' => Hash::make('asdf'),
            'is_specialist' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.org',
            'password' => Hash::make('asdf'),
            'is_admin' => true,
        ]);

        // Meetings
        DB::table('meetings')->insert([
            'user_id' => 1,
            'alcoholic_id' => 1,
            'patron_id' => 1,
            'date' => '2017-11-27',
            'location' => 'Some cafe',
            'confirmed' => false,
        ]);
        DB::table('meetings')->insert([
            'user_id' => 1,
            'alcoholic_id' => 1,
            'patron_id' => 1,
            'date' => '2017-11-23',
            'location' => 'Some cafe',
            'confirmed' => true,
        ]);
        DB::table('meetings')->insert([
            'user_id' => 1,
            'alcoholic_id' => 1,
            'patron_id' => 1,
            'date' => '2018-11-27',
            'location' => 'Some cafe',
            'confirmed' => true,
        ]);

    }
}
