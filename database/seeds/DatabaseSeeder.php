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
            'is_patron' => true,
            'patron_id' => 2,
            'specialist_id' => 4,
        ]);
        DB::table('users')->insert([
            'name' => 'alcoholic2',
            'email' => 'alcoholic2@example.org',
            'password' => Hash::make('asdf'),
            'is_alcoholic' => true,
            'is_patron' => true,
            'patron_id' => 3,
            'specialist_id' => 4,
        ]);
        DB::table('users')->insert([
            'name' => 'alcoholic3',
            'email' => 'alcoholic3@example.org',
            'password' => Hash::make('asdf'),
            'is_alcoholic' => true,
            'is_patron' => true,
            'patron_id' => 1,
            'specialist_id' => 4,
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
            'user1_id' => 1,
            'user2_id' => 2,
            'date' => '2017-11-27',
            'location' => 'Some cafe',
            'confirmed' => false,
        ]);
        DB::table('meetings')->insert([
            'user1_id' => 2,
            'user2_id' => 1,
            'date' => '2017-11-27',
            'location' => 'Some cafe',
            'confirmed' => false,
        ]);
        DB::table('meetings')->insert([
            'user1_id' => 2,
            'user2_id' => 1,
            'date' => '2017-11-23',
            'location' => 'Some cafe',
            'confirmed' => true,
        ]);
        DB::table('meetings')->insert([
            'user1_id' => 1,
            'user2_id' => 2,
            'date' => '2017-11-23',
            'location' => 'Some cafe',
            'confirmed' => true,
        ]);
        DB::table('meetings')->insert([
            'user1_id' => 2,
            'user2_id' => 1,
            'date' => '2018-11-27',
            'location' => 'Some cafe',
            'confirmed' => true,
        ]);
        DB::table('meetings')->insert([
            'user1_id' => 1,
            'user2_id' => 2,
            'date' => '2018-11-27',
            'location' => 'Some cafe',
            'confirmed' => true,
        ]);
    }
}
