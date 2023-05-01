<?php

use App\Models\Admin;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;

test('reset password link screen can be rendered', function () {
    $response = $this->get('/forgot-password');

    $response->assertStatus(200);
});

test('reset password link can be requested', function () {
    Notification::fake();

    $admin = Admin::factory()->create();

    $this->post('/forgot-password', ['email' => $admin->email]);

    Notification::assertSentTo($admin, ResetPassword::class);
});

test('reset password screen can be rendered', function () {
    Notification::fake();

    $admin = Admin::factory()->create();

    $this->post('/forgot-password', ['email' => $admin->email]);

    Notification::assertSentTo($admin, ResetPassword::class, function ($notification) {
        $response = $this->get('/reset-password/' . $notification->token);

        $response->assertStatus(200);

        return true;
    });
});

test('password can be reset with valid token', function () {
    Notification::fake();

    $admin = Admin::factory()->create();

    $this->post('/forgot-password', ['email' => $admin->email]);

    Notification::assertSentTo($admin, ResetPassword::class, function ($notification) use ($admin) {
        $response = $this->post('/reset-password', [
            'token' => $notification->token,
            'email' => $admin->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasNoErrors();

        return true;
    });
});
