<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Zabeer',
            'email' => 'z@gmail.com',
            'password' => Hash::make('ucl353@d'),
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Tonoy',
            'email' => 'tonoy@gmail.com',
            'password' => Hash::make('ucl353@'),
            'role_id' => 2,
        ]);

        /*  User::factory()->count(1000)->create();  

        /*  User::factory()->count(1000)->create(); 
        db pass UCL353@d
                ucl353@ROCKS
        */

        User::factory()->count(10)->create();
    }
}
