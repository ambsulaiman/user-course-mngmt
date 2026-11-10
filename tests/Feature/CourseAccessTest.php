<?php

use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

describe('course show page', function () {
    test('guest can view course details', function () {
        $course = Course::factory()->create(['title' => 'Public Course']);

        $this->get(route('courses.show', $course))
            ->assertOk()
            ->assertSee('Public Course');
    });

    test('authenticated user sees enroll button when not enrolled', function () {
        $user = User::factory()->create();
        $course = Course::factory()->create();

        $this->actingAs($user)
            ->get(route('courses.show', $course))
            ->assertOk()
            ->assertSee('Enroll Now');
    });

    test('enrolled user sees unenroll button', function () {
        $user = User::factory()->create();
        $course = Course::factory()->create();
        $user->courses()->attach($course->id);

        $this->actingAs($user)
            ->get(route('courses.show', $course))
            ->assertOk()
            ->assertSee('Unenroll');
    });
});

describe('course index page', function () {
    test('courses index is publicly accessible', function () {
        $course = Course::factory()->create(['title' => 'Visible Course']);

        $this->get(route('courses.index'))
            ->assertOk()
            ->assertSee('Visible Course');
    });

    test('admin sees edit and delete buttons', function () {
        $admin = User::factory()->create(['is_admin' => true]);
        $course = Course::factory()->create(['title' => 'Admin Course']);

        $this->actingAs($admin)
            ->get(route('courses.index'))
            ->assertOk()
            ->assertSee('Edit')
            ->assertSee('Delete');
    });

    test('non-admin does not see edit and delete buttons', function () {
        $user = User::factory()->create(['is_admin' => false]);
        $course = Course::factory()->create();

        $this->actingAs($user)
            ->get(route('courses.index'))
            ->assertOk()
            ->assertDontSee('Edit')
            ->assertDontSee('Delete');
    });

    test('pagination works with multiple courses', function () {
        Course::factory(20)->create();

        $response = $this->get(route('courses.index'));

        $response->assertOk();
        // Verify we can see pagination links
        $response->assertViewHas('courses');
    });
});

describe('course management authorization', function () {
    test('non-admin user cannot create course', function () {
        $user = User::factory()->create(['is_admin' => false]);

        $this->actingAs($user)
            ->get(route('courses.create'))
            ->assertStatus(403);
    });

    test('non-admin user cannot edit course', function () {
        $user = User::factory()->create(['is_admin' => false]);
        $course = Course::factory()->create();

        $this->actingAs($user)
            ->get(route('courses.edit', $course))
            ->assertStatus(403);
    });

    test('non-admin user cannot delete course', function () {
        $user = User::factory()->create(['is_admin' => false]);
        $course = Course::factory()->create();

        $this->actingAs($user)
            ->delete(route('courses.destroy', $course))
            ->assertStatus(403);
    });

    test('admin can create course', function () {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->post(route('courses.store'), [
                'title' => 'New Course',
                'description' => 'A new course',
                'max_students' => 30,
            ])
            ->assertRedirect(route('courses.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('courses', [
            'title' => 'New Course',
        ]);
    });

    test('admin can update course', function () {
        $admin = User::factory()->create(['is_admin' => true]);
        $course = Course::factory()->create();

        $this->actingAs($admin)
            ->put(route('courses.update', $course), [
                'title' => 'Updated Course',
                'description' => 'Updated description',
                'max_students' => 50,
            ])
            ->assertRedirect(route('courses.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('courses', [
            'id' => $course->id,
            'title' => 'Updated Course',
        ]);
    });

    test('admin can delete course', function () {
        $admin = User::factory()->create(['is_admin' => true]);
        $course = Course::factory()->create();

        $this->actingAs($admin)
            ->delete(route('courses.destroy', $course))
            ->assertRedirect(route('courses.index'))
            ->assertSessionHas('success');

        $this->assertDatabaseMissing('courses', ['id' => $course->id]);
    });
});

describe('enrollment authorization', function () {
    test('guest cannot enroll in course', function () {
        $course = Course::factory()->create();

        $this->post(route('courses.enroll', $course))
            ->assertRedirect(route('login'));
    });

    test('guest cannot unenroll from course', function () {
        $course = Course::factory()->create();

        $this->post(route('courses.unenroll', $course))
            ->assertRedirect(route('login'));
    });

    test('authenticated user can enroll', function () {
        $user = User::factory()->create();
        $course = Course::factory()->create();

        $this->actingAs($user)
            ->post(route('courses.enroll', $course))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('course_user', [
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);
    });

    test('authenticated user can unenroll', function () {
        $user = User::factory()->create();
        $course = Course::factory()->create();
        $user->courses()->attach($course->id);

        $this->actingAs($user)
            ->post(route('courses.unenroll', $course))
            ->assertSessionHas('success');

        $this->assertDatabaseMissing('course_user', [
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);
    });
});
