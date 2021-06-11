<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
        
        Product::factory()->create();
    }
}
