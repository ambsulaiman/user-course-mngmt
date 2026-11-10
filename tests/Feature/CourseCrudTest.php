<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('admin can create course', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $this->actingAs($admin)->post(route('courses.store'), [
        'title' => 'Test Course',
        'description' => 'Desc',
    ])->assertRedirect(route('courses.index'));
    $this->assertDatabaseHas('courses', ['title' => 'Test Course']);
});
