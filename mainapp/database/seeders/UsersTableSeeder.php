<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Define an array of Serbian usernames and emails
        $serbianUsernames = [
            'milan', 'ana', 'marko', 'jelena', 'nikola',
            'sofija', 'stefan', 'mina', 'dusan', 'jovana',
        ];

        $serbianEmails = [
            'milan@example.com', 'ana@example.com', 'marko@example.com',
            'jelena@example.com', 'nikola@example.com', 'sofija@example.com',
            'stefan@example.com', 'mina@example.com', 'dusan@example.com',
            'jovana@example.com',
        ];

        // Insert 10 random users with Serbian usernames and emails
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'username' => $serbianUsernames[$i],
                'email' => $serbianEmails[$i],
                'password' => bcrypt('test123'), // Hashed password
                'isAdmin' => false, // or you can randomly set this to true if needed
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
