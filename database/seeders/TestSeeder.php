<?php

namespace Database\Seeders;

use App\Models\mydb\member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!member::where('Nickname', 'test')->exists()) {
            member::factory()->create([
                'Nickname' => 'test',
                'Email' => 'test@gmail.com',
                'Password' => password_hash('1234', PASSWORD_DEFAULT),
            ]);
        }
        
        member::factory(1)->create();
    }
}
