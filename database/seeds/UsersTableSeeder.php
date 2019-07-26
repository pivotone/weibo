<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::find(1);
        $user->name = 'pivot';
        $user->email = 'idea@163.com';
        $user->password = bcrypt('123456');
        $user->is_admin = true;
        $user->save();
    }
}