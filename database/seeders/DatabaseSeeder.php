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
                'name' => 'WebForce',
                'email' => 'testroot@gmail.com',
                'password' => bcrypt('testroot'),
                'admin' => true
            ]);
        }
        
        Product::factory()->create();
    }
}
