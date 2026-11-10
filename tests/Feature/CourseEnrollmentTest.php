<?php

use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

test('auth user can enroll and duplicate enroll does not create duplicate pivot', function () {
    $user = User::factory()->create();
    $course = Course::factory()->create();

    $this->actingAs($user)->post(route('courses.enroll', $course))->assertRedirect();
    $this->assertDatabaseHas('course_user', ['user_id' => $user->id, 'course_id' => $course->id]);

    // enroll again
    $this->actingAs($user)->post(route('courses.enroll', $course))->assertRedirect();

    $count = DB::table('course_user')->where('user_id', $user->id)->where('course_id', $course->id)->count();
    expect($count)->toBe(1);
});

test('auth user can unenroll', function () {
    $user = User::factory()->create();
    $course = Course::factory()->create();
    $user->courses()->attach($course->id);

    $this->actingAs($user)->post(route('courses.unenroll', $course))->assertRedirect();
    $this->assertDatabaseMissing('course_user', ['user_id' => $user->id, 'course_id' => $course->id]);
});
