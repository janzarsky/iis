<?php

use App\User;
use App\Meeting;
use App\Check;
use App\Session;
use App\UserSession;
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
        $user1 = new User;
        $user1->name = 'alcoholic';
        $user1->email = 'alcoholic@example.org';
        $user1->password = Hash::make('asdf');
        $user1->is_alcoholic = true;
        $user1->is_patron = true;
        $user1->save();
        
        $user2 = new User;
        $user2->name = 'alcoholic2';
        $user2->email = 'alcoholic2@example.org';
        $user2->password = Hash::make('asdf');
        $user2->is_alcoholic = true;
        $user2->is_patron = true;
        $user2->save();
        
        $user3 = new User;
        $user3->name = 'alcoholic3';
        $user3->email = 'alcoholic3@example.org';
        $user3->password = Hash::make('asdf');
        $user3->is_alcoholic = true;
        $user3->is_patron = true;
        $user3->save();
        
        $user4 = new User;
        $user4->name = 'specialist';
        $user4->email = 'specialist@example.org';
        $user4->password = Hash::make('asdf');
        $user4->is_specialist = true;
        $user4->save();
        
        $user5 = new User;
        $user5->name = 'admin';
        $user5->email = 'admin@example.org';
        $user5->password = Hash::make('asdf');
        $user5->is_admin = true;
        $user5->save();

        $user6 = new User;
        $user6->name = 'alcoholic_deletable';
        $user6->email = 'alcoholic_deletable3@example.org';
        $user6->password = Hash::make('asdf');
        $user6->is_alcoholic = true;
        $user6->save();

        $user1 = User::find(1);
        $user1->patron_id = 2;
        $user1->specialist_id = 4;
        $user1->patron_confirmed = true;
        $user1->save();

        $user2 = User::find(2);
        $user2->patron_id = 1;
        $user2->specialist_id = 4;
        $user2->patron_confirmed = true;
        $user2->save();

        $user3 = User::find(3);
        $user3->patron_id = 1;
        $user3->specialist_id = 4;
        $user3->save();

        // Meetings
        $mtg1 = new Meeting;
        $mtg1->user1_id = 1;
        $mtg1->user2_id = 2;
        $mtg1->date = '2017-11-27';
        $mtg1->location = 'Some cafe';
        $mtg1->confirmed = false;
        $mtg1->save();
        
        $mtg2 = new Meeting;
        $mtg2->user1_id = 2;
        $mtg2->user2_id = 1;
        $mtg2->date = '2017-11-27';
        $mtg2->location = 'Some cafe';
        $mtg2->confirmed = false;
        $mtg2->save();
        
        $mtg3 = new Meeting;
        $mtg3->user1_id = 2;
        $mtg3->user2_id = 1;
        $mtg3->date = '2017-11-23';
        $mtg3->location = 'Some cafe';
        $mtg3->confirmed = true;
        $mtg3->save();
        
        $mtg4 = new Meeting;
        $mtg4->user1_id = 1;
        $mtg4->user2_id = 2;
        $mtg4->date = '2017-11-23';
        $mtg4->location = 'Some cafe';
        $mtg4->confirmed = true;
        $mtg4->save();

        $mtg5 = new Meeting;
        $mtg5->user1_id = 2;
        $mtg5->user2_id = 1;
        $mtg5->date = '2018-11-27';
        $mtg5->location = 'Some cafe';
        $mtg5->confirmed = true;
        $mtg5->save();

        $mtg6 = new Meeting;
        $mtg6->user1_id = 1;
        $mtg6->user2_id = 2;
        $mtg6->date = '2018-11-27';
        $mtg6->location = 'Some cafe';
        $mtg6->confirmed = true;
        $mtg6->save();

        // Checks
        $c1 = new Check();
        $c1->alcoholic_id = 1;
        $c1->amount = 1;
        $c1->save();

        $c2 = new Check();
        $c2->alcoholic_id = 2;
        $c2->amount = 2;
        $c2->save();

        $c3 = new Check();
        $c3->alcoholic_id = 1;
        $c3->amount = 2;
        $c3->save();

        // Sessions
        $s1 = new Session();
        $s1->organizer_id = 1;
        $s1->date = '2018-01-02';
        $s1->location = 'some meeting room';
        $s1->save();

        $s1 = new Session();
        $s1->organizer_id = 4;
        $s1->date = '2018-01-04';
        $s1->location = 'some meeting room';
        $s1->save();

        $us1 = new UserSession();
        $us1->user_id = 1;
        $us1->session_id = 2;
        $us1->save();

        $s1 = new Session();
        $s1->organizer_id = 4;
        $s1->date = '2018-01-06';
        $s1->location = 'some meeting room';
        $s1->save();

    }
}
