<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //User 1 - Cara simpan data kaedah model - New Object
        $user1 = new \App\Models\User;
        $user1->nama = 'Barbie';
        $user1->email = 'barbie@gmail.com';
        $user1->password = bcrypt('pass123');//atau hash::make('pass123');
        $user1->status = 'active';
        $user1->role = 'admin';
        $user1->save();

        //User2 - cara simpan data kaedah model - create
        $user2 = \App\Models\User::create([
            'nama' => 'Doraemon',
            'email' => 'doraemon@gmail.com',
            'password' => bcrypt('pass123'),
            'role' => 'user',
            'status' => 'active'
        ]);

        //User 3 - Cara simpan data Kaedah Query Builder
        $user3 = DB::table('users')->insert([
            'nama' => 'Upin',
            'email' => 'upin@gmail.com',
            'password' => bcrypt('pass123'),
            'role' => 'user',
            'status' => 'active'
        ]);
    }
}
