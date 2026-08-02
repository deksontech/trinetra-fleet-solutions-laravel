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

    public function test_admin_routes_are_removed(): void
    {
        $this->get('/admin')->assertNotFound();
        $this->get('/admin/login')->assertNotFound();
        $this->get('/admin/leads')->assertNotFound();
        $this->get('/admin/content/vehicles')->assertNotFound();

        $adminRoutes = collect(app('router')->getRoutes())->filter(fn ($route) => str_starts_with($route->uri(), 'admin'));

        $this->assertCount(0, $adminRoutes);
    }
}
