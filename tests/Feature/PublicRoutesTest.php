<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_core_public_pages_render(): void
    {
        $this->seed();

        foreach (['/', '/about', '/fleet', '/services', '/locations', '/tours', '/blog', '/careers', '/contact', '/request-a-quote', '/legal'] as $path) {
            $this->get($path)->assertOk();
        }
    }

    public function test_dynamic_content_routes_render(): void
    {
        $this->seed();

        $this->get('/fleet/mercedes-benz-s-class')->assertOk();
        $this->get('/services/corporate-car-rental')->assertOk();
        $this->get('/locations/delhi')->assertOk();
        $this->get('/tours/golden-triangle-tour')->assertOk();
        $this->get('/blog/employee-transportation-best-practices')->assertOk();
    }

    public function test_admin_requires_login(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }
}
