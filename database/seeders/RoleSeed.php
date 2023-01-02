<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Dashboard;


class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin
        User::create([
            'nama' => 'Eriza Alfansyah Sukatma',
            'email' => 'eriza.alfansyah@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 1,
        ]);

        // user
        User::create([
            'nama' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 0,
        ]);

        Dashboard::create([
            'title' => 'hello',
            'isi' => 'user@gmail.com fjdksjfdsifjsfs',
            'penyusun' => 'eriza',
            'link' => 'hello-kamu-disitu',
        ]);
    }
}
