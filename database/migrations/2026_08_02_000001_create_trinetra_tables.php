<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('action');
            $table->string('subject');
            $table->timestamps();
            $table->unique(['action', 'subject']);
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        Schema::create('permission_role', function (Blueprint $table) {
            $table->foreignId('permission_id')->constrained()->cascadeOnDelete();
            $table->foreignId('role_id')->constrained()->cascadeOnDelete();
            $table->primary(['permission_id', 'role_id']);
        });
        Schema::create('role_user', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->primary(['role_id', 'user_id']);
        });
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration');
        });
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index();
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts');
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('action');
            $table->string('entity');
            $table->string('entity_id')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });

        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('enquiry_number')->unique();
            $table->string('customer_name');
            $table->string('company')->nullable();
            $table->string('email')->index();
            $table->string('phone')->index();
            $table->string('service')->index();
            $table->string('pickup_location')->nullable();
            $table->string('destination')->nullable();
            $table->dateTime('pickup_date')->nullable();
            $table->dateTime('return_date')->nullable();
            $table->unsignedInteger('passenger_count')->nullable();
            $table->unsignedInteger('luggage_count')->nullable();
            $table->text('vehicle_requirements')->nullable();
            $table->string('source')->nullable();
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->text('internal_notes')->nullable();
            $table->string('assigned_employee')->nullable();
            $table->string('status')->default('New')->index();
            $table->dateTime('follow_up_date')->nullable();
            $table->json('raw_payload')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('lead_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained()->cascadeOnDelete();
            $table->text('note');
            $table->string('author')->nullable();
            $table->timestamps();
        });
        Schema::create('lead_status_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained()->cascadeOnDelete();
            $table->string('status');
            $table->string('changed_by')->nullable();
            $table->timestamps();
        });

        Schema::create('services', fn (Blueprint $table) => $this->contentTable($table, extra: function (Blueprint $table) {
            $table->boolean('is_optional')->default(false);
            $table->json('features')->nullable();
            $table->json('process')->nullable();
            $table->string('image')->nullable();
        }));
        Schema::create('vehicle_categories', fn (Blueprint $table) => $this->contentTable($table, hasSummary: false, extra: function (Blueprint $table) {
            $table->string('capacity')->nullable();
        }));
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->foreignId('vehicle_category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('passenger_capacity')->nullable();
            $table->string('luggage_capacity')->nullable();
            $table->string('transmission')->nullable();
            $table->string('fuel_type')->nullable();
            $table->json('features')->nullable();
            $table->json('suitable_services')->nullable();
            $table->text('recommended_use')->nullable();
            $table->text('disclaimer')->nullable();
            $table->string('image')->nullable();
            $table->boolean('featured')->default(false);
            $table->string('status')->default('Published')->index();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('vehicle_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete();
            $table->string('url');
            $table->string('alt');
            $table->string('type')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('locations', fn (Blueprint $table) => $this->contentTable($table, extra: function (Blueprint $table) {
            $table->string('region')->nullable();
            $table->boolean('active')->default(false)->index();
            $table->json('hubs')->nullable();
            $table->json('routes')->nullable();
        }));
        Schema::create('tours', fn (Blueprint $table) => $this->contentTable($table, hasBody: false, extra: function (Blueprint $table) {
            $table->json('itinerary')->nullable();
            $table->string('duration')->nullable();
            $table->json('inclusions')->nullable();
            $table->json('exclusions')->nullable();
            $table->json('notes')->nullable();
        }));
        Schema::create('tour_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained()->cascadeOnDelete();
            $table->string('url');
            $table->string('alt');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('clients', fn (Blueprint $table) => $this->simpleEntity($table, ['logo_url', 'industry']));
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->text('quote');
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->string('status')->default('Draft');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('gallery_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('image_url');
            $table->text('caption')->nullable();
            $table->string('alt');
            $table->string('status')->default('Draft');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('videos', fn (Blueprint $table) => $this->simpleEntity($table, ['embed_url', 'caption']));

        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('excerpt');
            $table->longText('body');
            $table->string('author');
            $table->foreignId('blog_category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('status')->default('Draft');
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->string('page_slug')->nullable()->index();
            $table->string('category')->nullable();
            $table->string('status')->default('Published');
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('careers', fn (Blueprint $table) => $this->contentTable($table, hasSummary: false, extra: function (Blueprint $table) {
            $table->string('type');
            $table->string('location');
        }));
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->foreignId('career_id')->nullable()->constrained()->nullOnDelete();
            $table->string('job_slug')->index();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('experience')->nullable();
            $table->text('message')->nullable();
            $table->string('cv_url')->nullable();
            $table->boolean('consent')->default(false);
            $table->string('status')->default('New');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('legal_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->longText('body');
            $table->string('status')->default('Draft');
            $table->boolean('requires_review')->default(true);
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamps();
        });
        Schema::create('page_seos', function (Blueprint $table) {
            $table->id();
            $table->string('path')->unique();
            $table->string('title');
            $table->text('description');
            $table->string('canonical_url')->nullable();
            $table->string('og_image')->nullable();
            $table->boolean('no_index')->default(false);
            $table->timestamps();
        });
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->json('value');
            $table->timestamps();
        });
        Schema::create('contact_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('department');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->text('message');
            $table->boolean('consent')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('newsletter_subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('status')->default('Subscribed');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('media_assets', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('filename');
            $table->string('mime_type');
            $table->unsignedInteger('size')->nullable();
            $table->string('alt')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        foreach (array_reverse(['media_assets', 'newsletter_subscribers', 'contact_submissions', 'site_settings', 'page_seos', 'legal_pages', 'job_applications', 'careers', 'faqs', 'blog_posts', 'blog_categories', 'videos', 'gallery_items', 'gallery_categories', 'testimonials', 'clients', 'tour_images', 'tours', 'locations', 'vehicle_images', 'vehicles', 'vehicle_categories', 'services', 'lead_status_histories', 'lead_notes', 'leads', 'audit_logs', 'jobs', 'cache_locks', 'cache', 'sessions', 'role_user', 'permission_role', 'password_reset_tokens', 'users', 'permissions', 'roles']) as $table) {
            Schema::dropIfExists($table);
        }
    }

    private function contentTable(Blueprint $table, bool $hasSummary = true, bool $hasBody = true, ?callable $extra = null): void
    {
        $table->id();
        $table->string('slug')->unique();
        $table->string('title')->nullable();
        $table->string('name')->nullable();
        if ($hasSummary) {
            $table->text('summary')->nullable();
        }
        if ($hasBody) {
            $table->longText('body')->nullable();
        }
        $table->string('status')->default('Published')->index();
        $table->integer('order')->default(0);
        $table->string('seo_title')->nullable();
        $table->text('seo_description')->nullable();
        $table->string('canonical_url')->nullable();
        $table->timestamp('published_at')->nullable();
        if ($extra) {
            $extra($table);
        }
        $table->timestamps();
        $table->softDeletes();
    }

    private function simpleEntity(Blueprint $table, array $nullableStrings = []): void
    {
        $table->id();
        $table->string('name')->nullable();
        $table->string('title')->nullable();
        foreach ($nullableStrings as $field) {
            $table->text($field)->nullable();
        }
        $table->string('status')->default('Draft');
        $table->integer('order')->default(0);
        $table->timestamps();
        $table->softDeletes();
    }
};
