<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        DB::table('lectures')->insert([
            [
                'name'        => 'Introduction to the Course',
                'order'       => 1,
                'description' => 'Overview of the course and what students will learn.',
                'duration'    => 12, // minutes
                'link'        => 'https://youtu.be/-13zu7tq2WE?si=FstGus0xA1DgglCa',
                'course_id'   => 1,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Getting Started',
                'order'       => 2,
                'description' => 'Setting up the environment and basic concepts.',
                'duration'    => 25,
                'link'        => 'https://youtu.be/-13zu7tq2WE?si=FstGus0xA1DgglCa',
                'course_id'   => 1,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Core Concepts',
                'order'       => 3,
                'description' => 'Deep dive into the core concepts of the course.',
                'duration'    => 40,
                'link'        => 'https://youtu.be/-13zu7tq2WE?si=FstGus0xA1DgglCa',
                'course_id'   => 1,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Advanced Techniques',
                'order'       => 4,
                'description' => 'Advanced techniques and best practices related to the course.',
                'duration'    => 35,
                'link'        => 'https://example.com/lecture-4',
                'course_id'   => 1,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],

            [
                'name'        => 'Final Project & Wrap Up',
                'order'       => 5,
                'description' => 'Building the final project and summarizing key takeaways.',
                'duration'    => 30,
                'link'        => 'https://example.com/lecture-5',
                'course_id'   => 1,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ]
        ]);
    }
}
