<?php

use Illuminate\Database\Seeder;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // იქმნება Admin მომხმარებელი=
    public function run()
    {
        $users = new Users;
        $users->firstname = 'admin';
        $users->lastname  = 'admin';
        $users->email     = 'admin.GeoTravel@gmail.com';
        $users->country   = 'Georgia';
        $users->password  = Hash::make('Password111!');
        $users->is_admin  = 1;
        $users->save();
    }
}
