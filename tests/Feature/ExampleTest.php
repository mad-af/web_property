<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example() {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_find_home() {
        $response = $this->get('/find-home');
        $response->assertStatus(200);
    }

    public function test_about_us() {
        $response = $this->get('/about-us');
        $response->assertStatus(200);
    }

    public function test_auth_login() {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_auth_register() {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_auth_forgot_password() {
        $response = $this->get('/forgot-password');
        $response->assertStatus(200);
    }

    public function test_user_property() {
        $response = $this->get('/user/property');
        $response->assertStatus(302);
    }

    public function test_user_detail_property() {
        $response = $this->get('/user/property/1');
        $response->assertStatus(302);
    }
    
    public function test_user_find_home() {
        $response = $this->get('/user/find-home');
        $response->assertStatus(302);
    }

    public function test_user_cart() {
        $response = $this->get('/user/cart');
        $response->assertStatus(302);
    }

    public function test_admin_property() {
        $response = $this->get('/admin/property');
        $response->assertStatus(302);
    }
    
    public function test_admin_add_property_view() {
        $response = $this->get('/admin/property/add');
        $response->assertStatus(302);
    }

    public function test_admin_detail_property() {
        $response = $this->get('/admin/property/1');
        $response->assertStatus(302);
    }

    public function test_admin_user() {
        $response = $this->get('/admin/user');
        $response->assertStatus(302);
    }

    public function test_admin_add_user_view() {
        $response = $this->get('/admin/user/add');
        $response->assertStatus(302);
    }

    public function test_admin_order() {
        $response = $this->get('/admin/order');
        $response->assertStatus(302);
    }
}
