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
        $admin = DB::table('users')->insert([
            'name' => 'admin-jpc',
            'slug' => 'admin-jpc',
            'nim' => '123456789',
            'programstudi_id' => '1',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('katasandi'),
        ]);


        $role = DB::table('role_users')->insert([
            'user_id' => $admin,
            'role_id' => '1'
        ]);
    }
}
