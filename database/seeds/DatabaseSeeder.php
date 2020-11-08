<?php
use App\User;
use App\Task;
use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('UserTableSeeder');
        $this->call('TaskTableSeeder');

        $this->command->info('User table seeded!');
    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create(['firstname' => 'admin',
        'lastname' => 'admin',
        'birthdate' => '09/01/1996',

        'email'=>'admin@admin.admin',
        'role'=>0,
        'phonenumber'=>'054654875',
        'password'=>bcrypt('123456789')]);

        User::create(['firstname' => 'user2',
        'lastname' => 'user2',
        'birthdate' => '09/01/1997',
        'email'=>'user2@usr.dr',
        'role'=>1,
        'phonenumber'=>'043264478',
        'password'=>bcrypt('123456789')]);

        User::create(['firstname' => 'user3',
        'lastname' => 'user3',
        'birthdate' => '09/01/1998',
        'email'=>'user3@usr.dr',
        'role'=>1,
        'phonenumber'=>'043264478',
        'password'=>bcrypt('123456789')]);

        User::create(['firstname' => 'user4',
        'lastname' => 'user4',
        'birthdate' => '09/01/1999',
        'email'=>'user4@usr.dr',
        'role'=>1,
        'phonenumber'=>'043264478',
        'password'=>bcrypt('123456789')]);
    }
}
    class TaskTableSeeder extends Seeder {

        public function run()
        {
            DB::table('tasks')->delete();
        Task::create(['client' => 'user1',
            'email'=>'user1@u.u',
            'phonenumber'=>'043264478',
            'adresse'=>'gtz zugz uhbhejcznez c zhcnid j dd ',
            'product'=>'uhdjde bued dcedc',
            'description'=>'bjekznjekzr jernklcerc bjknlerc bjkenlc hjbknl,er ieojper']
        );

        Task::create(['client' => 'user2',
        'email'=>'user1@u.u',
        'phonenumber'=>'043264478',
        'adresse'=>'gtz zugz uhbhejcznez c zhcnid j dd ',
        'product'=>'ued dcedc',
        'description'=>'bjekznjekzr jernklcerc bjknlerc bjkenlc hjbknl,er ieojper']
    );


}
    }