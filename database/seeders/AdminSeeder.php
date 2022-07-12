<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'administration',
            'email' => 'administration@gmail.com',
            'password' => bcrypt('admin123'),
            'status' => '1',
            'current_team_id' => '11',

        ];

        Admin::create($admin);
    }
}
