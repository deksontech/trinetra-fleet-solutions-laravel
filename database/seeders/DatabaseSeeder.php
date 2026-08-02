<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Career;
use App\Models\FAQ;
use App\Models\GalleryCategory;
use App\Models\LegalPage;
use App\Models\Location;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use App\Models\VehicleImage;
use App\Models\Tour;
use App\Support\TrinetraData;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach (TrinetraData::services() as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], [
                'title' => $service['title'],
                'summary' => $service['summary'],
                'body' => $service['summary'],
                'is_optional' => $service['optional'],
                'features' => $service['features'],
                'process' => $service['process'],
                'image' => $service['image'],
                'status' => 'Published',
                'order' => $service['order'],
                'published_at' => now(),
            ]);
            foreach ($service['faqs'] as $index => $faq) {
                FAQ::updateOrCreate(['page_slug' => $service['slug'], 'question' => $faq['question']], [
                    'answer' => $faq['answer'],
                    'category' => 'Service',
                    'order' => $index,
                    'status' => 'Published',
                ]);
            }
        }

        $categoryIds = [];
        foreach (TrinetraData::fleetCategories() as $category) {
            $model = VehicleCategory::updateOrCreate(['slug' => $category['slug']], [
                'name' => $category['name'],
                'title' => $category['name'],
                'capacity' => $category['capacity'],
                'status' => 'Published',
            ]);
            $categoryIds[$category['slug']] = $model->id;
        }
        foreach (TrinetraData::vehicles() as $index => $vehicle) {
            $model = Vehicle::updateOrCreate(['slug' => $vehicle['slug']], [
                'name' => $vehicle['name'],
                'vehicle_category_id' => $categoryIds[$vehicle['category']] ?? null,
                'passenger_capacity' => $vehicle['passengers'],
                'luggage_capacity' => $vehicle['luggage'],
                'transmission' => $vehicle['transmission'],
                'fuel_type' => $vehicle['fuel'],
                'features' => $vehicle['features'],
                'suitable_services' => $vehicle['suitable'],
                'disclaimer' => $vehicle['disclaimer'],
                'image' => $vehicle['image'],
                'featured' => $index < 6,
                'status' => 'Published',
                'published_at' => now(),
            ]);
            VehicleImage::updateOrCreate(['vehicle_id' => $model->id, 'url' => $vehicle['image']], [
                'alt' => $vehicle['name'].' vehicle image',
                'type' => 'Exterior',
            ]);
        }

        foreach (TrinetraData::locations() as $location) {
            Location::updateOrCreate(['slug' => $location['slug']], [
                'name' => $location['name'],
                'title' => $location['name'],
                'summary' => $location['intro'],
                'body' => $location['intro'],
                'region' => $location['region'],
                'active' => true,
                'hubs' => $location['hubs'],
                'routes' => $location['routes'],
                'status' => 'Published',
                'published_at' => now(),
            ]);
        }

        foreach (TrinetraData::tours() as $tour) {
            Tour::updateOrCreate(['slug' => $tour['slug']], [
                'title' => $tour['title'],
                'summary' => $tour['summary'],
                'itinerary' => $tour['itinerary'],
                'duration' => $tour['duration'],
                'inclusions' => $tour['inclusions'],
                'exclusions' => $tour['exclusions'],
                'notes' => $tour['notes'],
                'status' => 'Published',
                'published_at' => now(),
            ]);
        }

        foreach (TrinetraData::galleryCategories() as $category) {
            GalleryCategory::firstOrCreate(['slug' => Str::slug($category)], ['name' => $category]);
        }
        foreach (TrinetraData::blogCategories() as $category) {
            BlogCategory::firstOrCreate(['slug' => Str::slug($category)], ['name' => $category]);
        }
        foreach (TrinetraData::posts() as $post) {
            $category = BlogCategory::where('name', $post['category'])->first();
            BlogPost::updateOrCreate(['slug' => $post['slug']], [
                'title' => $post['title'],
                'excerpt' => 'Placeholder article for launch. Replace with reviewed editorial content before publication.',
                'body' => "This draft article is written as original placeholder content for Trinetra Fleet Solutions.\n\nBefore publication, add verified operating details, internal process notes and reviewed examples. Do not add client names, statistics or achievements unless they are verified.",
                'author' => 'Trinetra Fleet Solutions Editorial Team',
                'blog_category_id' => $category?->id,
                'status' => 'Draft',
            ]);
        }
        foreach (TrinetraData::jobs() as $job) {
            Career::updateOrCreate(['slug' => $job['slug']], [
                'title' => $job['title'],
                'name' => $job['title'],
                'type' => $job['type'],
                'location' => $job['location'],
                'body' => 'Placeholder job description. Replace before publishing.',
                'status' => 'Published',
            ]);
        }
        foreach (TrinetraData::legalPages() as $page) {
            LegalPage::updateOrCreate(['slug' => $page['slug']], [
                'title' => $page['title'],
                'body' => 'Draft legal content requiring professional review before publication.',
                'status' => 'Draft',
                'requires_review' => true,
            ]);
        }
        SiteSetting::updateOrCreate(['key' => 'contact'], ['value' => TrinetraData::site()]);
    }
}
