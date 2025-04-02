<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'camila@gmail.com.br')->first()) {
            User::create([
                'name' => 'Camila',
                'email' => 'camila@gmail.com.br',
                'ra' => '221845652'
            ]);
        }
        
        if (!User::where('email', 'rafael@gmail.com.br')->first()) {
            User::create([
                'name' => 'Rafael',
                'email' => 'rafael@gmail.com.br',
                 'ra' => '221030852'
                ]);   
       
         }

         if (!User::where('email', 'profmarcos@gmail.com.br')->first()) {
            User::create([
                'name' => 'Prof Marcos',
                'email' => 'profmarcos@gmail.com.br',
                 'ra' => '2211111100112'
                ]);   
       
         }
    }
}