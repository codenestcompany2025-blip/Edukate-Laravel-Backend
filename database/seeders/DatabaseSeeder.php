<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        \App\Models\Student::create(
            [
                'name' => 'Heba',
                'email' => 'hebanedal608@gmail.com',
                'password' => Hash::make(123456789),
                'gender' => 'f',
            ]
        );
        \App\Models\Admin::create(
            [
                'name' => 'Ahmed',
                'email' => 'ahmed@gmail.com',
                'password' => Hash::make(123456789),
            ]
        );

        \App\Models\Instructor::create(
            [
                'name' => 'Heba',
                'email' => 'hebanedal608@gmail.com',
                'password' => Hash::make(123456789),
                'qualification' => 'b',
                'major' => 'software engineering',
                'phone' => '0594800037',
                'gender' => 'f',
                'salary' => 1000,
            ]
        );

    }
}
