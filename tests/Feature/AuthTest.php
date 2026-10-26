<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_with_warning(): void
    {
        $response = $this->get(route('products.index'));

        $response->assertRedirect(route('login'));
        $response->assertSessionHas('warning', 'Verileri görmek için giriş yapmalısınız.');
    }

    public function test_warning_is_shown_on_login_page(): void
    {
        $response = $this->followingRedirects()->get(route('products.index'));

        $response->assertOk();
        $response->assertSee('Verileri görmek için giriş yapmalısınız.');
    }

    public function test_user_can_register(): void
    {
        $response = $this->post(route('register.store'), [
            'full_name' => 'Efe Dayan',
            'email' => 'efe@example.com',
            'password' => 'gizli1234',
            'password_confirmation' => 'gizli1234',
        ]);

        $response->assertRedirect(route('products.index'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['email' => 'efe@example.com', 'full_name' => 'Efe Dayan']);
    }

    public function test_register_fails_when_password_confirmation_does_not_match(): void
    {
        $response = $this->post(route('register.store'), [
            'full_name' => 'Efe Dayan',
            'email' => 'efe@example.com',
            'password' => 'gizli1234',
            'password_confirmation' => 'baska1234',
        ]);

        $response->assertSessionHasErrors('password');
        $this->assertGuest();
        $this->assertDatabaseCount('users', 0);
    }

    public function test_register_fails_when_email_is_taken(): void
    {
        User::factory()->create(['email' => 'efe@example.com']);

        $response = $this->post(route('register.store'), [
            'full_name' => 'Efe Dayan',
            'email' => 'efe@example.com',
            'password' => 'gizli1234',
            'password_confirmation' => 'gizli1234',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertDatabaseCount('users', 1);
    }

    public function test_user_can_login(): void
    {
        $user = User::factory()->create();

        $response = $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect(route('products.index'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_login_fails_with_wrong_password(): void
    {
        $user = User::factory()->create();

        $response = $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'yanlis-sifre',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('logout'));

        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }
}
