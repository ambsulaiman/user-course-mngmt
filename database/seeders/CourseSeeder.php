<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@example.com')],
            [
                'name' => 'Admin',
                'password' => bcrypt(env('ADMIN_PASSWORD', 'password')),
                'is_admin' => true,
            ]
        );

        $courses = Course::factory()->count(10)->create();

        // enroll admin in first two courses for convenience
        $firstTwo = $courses->take(2)->pluck('id')->all();
        if (! empty($firstTwo)) {
            $admin->courses()->syncWithoutDetaching($firstTwo);
        }
    }
}
