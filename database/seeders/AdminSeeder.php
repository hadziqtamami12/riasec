<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = DB::table('users')->insert([
            'name' => 'Super Admin',
            'slug' => 'super-admin',
            'nim' => '62123456789',
            'programstudi_id' => '1',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('katasandi'),
        ]);


        $role = DB::table('role_users')->insert([
            'user_id' => $superadmin,
            'role_id' => '1'
        ]);
    }
}
