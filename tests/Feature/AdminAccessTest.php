<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('guest is redirected to login when accessing create course', function () {
    $this->get(route('courses.create'))->assertRedirect();
});

test('non-admin user receives 403 for admin-only pages', function () {
    $user = User::factory()->create(['is_admin' => false]);
    $this->actingAs($user)->get(route('courses.create'))->assertStatus(403);
});

test('admin can access admin-only pages', function () {
    $admin = User::factory()->create(['is_admin' => true]);
    $this->actingAs($admin)->get(route('courses.create'))->assertOk();
});
