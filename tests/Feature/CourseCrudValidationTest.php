<?php

use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

describe('course create and store', function () {
    test('admin can create course with valid data', function () {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->post(route('courses.store'), [
                'title' => 'Test Course',
                'description' => 'A test description',
                'max_students' => 30,
            ])
            ->assertRedirect(route('courses.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('courses', [
            'title' => 'Test Course',
            'description' => 'A test description',
            'max_students' => 30,
        ]);
    });

    test('title is required when creating course', function () {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->post(route('courses.store'), [
                'title' => '',
                'description' => 'A test description',
                'max_students' => 30,
            ])
            ->assertRedirect();

        // Should not have been created
        expect(Course::count())->toBe(0);
    });

    test('description is required when creating course', function () {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->post(route('courses.store'), [
                'title' => 'Test Course',
                'description' => '',
                'max_students' => 30,
            ])
            ->assertRedirect();

        // Should not have been created
        expect(Course::count())->toBe(0);
    });

    test('max_students is required', function () {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->post(route('courses.store'), [
                'title' => 'Test Course',
                'description' => 'A test description',
                'max_students' => '',
            ])
            ->assertRedirect();
    });
});

describe('course update', function () {
    test('can update course with valid data', function () {
        $admin = User::factory()->create(['is_admin' => true]);
        $course = Course::factory()->create([
            'title' => 'Original Title',
            'description' => 'Original description',
        ]);

        $this->actingAs($admin)
            ->put(route('courses.update', $course), [
                'title' => 'Updated Title',
                'description' => 'Updated description',
                'max_students' => 50,
            ])
            ->assertRedirect(route('courses.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('courses', [
            'id' => $course->id,
            'title' => 'Updated Title',
            'description' => 'Updated description',
        ]);
    });

    test('cannot update course with blank title', function () {
        $admin = User::factory()->create(['is_admin' => true]);
        $course = Course::factory()->create(['title' => 'Original Title']);

        $this->actingAs($admin)
            ->put(route('courses.update', $course), [
                'title' => '',
                'description' => 'Updated description',
                'max_students' => 50,
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('courses', [
            'id' => $course->id,
            'title' => 'Original Title',
        ]);
    });
});
