<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Career;
use App\Models\Client;
use App\Models\FAQ;
use App\Models\GalleryItem;
use App\Models\JobApplication;
use App\Models\LegalPage;
use App\Models\Location;
use App\Models\MediaAsset;
use App\Models\PageSEO;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\Tour;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use App\Models\VehicleImage;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContentController extends Controller
{
    private array $modules = [
        'fleet-categories' => ['label' => 'Fleet Categories', 'model' => VehicleCategory::class, 'columns' => ['name', 'capacity', 'status']],
        'vehicles' => ['label' => 'Vehicles', 'model' => Vehicle::class, 'columns' => ['name', 'passenger_capacity', 'fuel_type', 'status']],
        'vehicle-images' => ['label' => 'Vehicle Images', 'model' => VehicleImage::class, 'columns' => ['alt', 'url', 'type']],
        'services' => ['label' => 'Services', 'model' => Service::class, 'columns' => ['title', 'status', 'order']],
        'locations' => ['label' => 'Locations', 'model' => Location::class, 'columns' => ['name', 'region', 'active']],
        'tours' => ['label' => 'Tours', 'model' => Tour::class, 'columns' => ['title', 'duration', 'status']],
        'client-logos' => ['label' => 'Client Logos', 'model' => Client::class, 'columns' => ['name', 'industry', 'status']],
        'testimonials' => ['label' => 'Testimonials', 'model' => Testimonial::class, 'columns' => ['name', 'company', 'status']],
        'gallery' => ['label' => 'Gallery', 'model' => GalleryItem::class, 'columns' => ['title', 'alt', 'status']],
        'videos' => ['label' => 'Videos', 'model' => Video::class, 'columns' => ['title', 'embed_url', 'status']],
        'careers' => ['label' => 'Careers', 'model' => Career::class, 'columns' => ['title', 'type', 'location', 'status']],
        'job-applications' => ['label' => 'Job Applications', 'model' => JobApplication::class, 'columns' => ['reference', 'full_name', 'email', 'status']],
        'blogs' => ['label' => 'Blogs', 'model' => BlogPost::class, 'columns' => ['title', 'author', 'status']],
        'blog-categories' => ['label' => 'Blog Categories', 'model' => BlogCategory::class, 'columns' => ['name', 'slug']],
        'faqs' => ['label' => 'FAQs', 'model' => FAQ::class, 'columns' => ['question', 'page_slug', 'status']],
        'legal-pages' => ['label' => 'Legal Pages', 'model' => LegalPage::class, 'columns' => ['title', 'slug', 'status']],
        'seo-settings' => ['label' => 'SEO Settings', 'model' => PageSEO::class, 'columns' => ['path', 'title', 'no_index']],
        'website-settings' => ['label' => 'Website Settings', 'model' => SiteSetting::class, 'columns' => ['key']],
        'admin-users' => ['label' => 'Admin Users', 'model' => User::class, 'columns' => ['name', 'email']],
        'roles-permissions' => ['label' => 'Roles', 'model' => Role::class, 'columns' => ['name']],
        'permissions' => ['label' => 'Permissions', 'model' => Permission::class, 'columns' => ['action', 'subject']],
        'media' => ['label' => 'Media Assets', 'model' => MediaAsset::class, 'columns' => ['filename', 'mime_type', 'size']],
        'audit-logs' => ['label' => 'Audit Logs', 'model' => AuditLog::class, 'columns' => ['action', 'entity', 'entity_id']],
    ];

    public function index(Request $request, string $module): View
    {
        abort_unless(isset($this->modules[$module]), 404);

        $definition = $this->modules[$module];
        $query = $definition['model']::query()->latest('id');
        if ($request->filled('q')) {
            $query->where(function ($builder) use ($definition, $request) {
                foreach ($definition['columns'] as $column) {
                    $builder->orWhere($column, 'like', '%'.$request->string('q').'%');
                }
            });
        }

        return view('admin.content-index', [
            'module' => $module,
            'definition' => $definition,
            'records' => $query->paginate(15)->withQueryString(),
        ]);
    }

    public function modules(): array
    {
        return $this->modules;
    }
}
