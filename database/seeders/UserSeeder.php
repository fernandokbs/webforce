<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::count() == 0)
        {
            User::factory()->create([
                'name' => 'WebForceAdmin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('testroot'),
                'admin' => true
            ]);

            User::factory()->create([
                'name' => 'WebForceClient',
                'email' => 'client@gmail.com',
                'password' => bcrypt('testroot'),
                'admin' => false
            ]);
        }
    }
}
