<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Career;
use App\Models\LegalPage;
use App\Models\Location;
use App\Models\Service;
use App\Models\Tour;
use App\Models\Vehicle;
use App\Support\TrinetraData;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class PublicController extends Controller
{
    public function home(): View { return view('pages.home', $this->base()); }
    public function about(): View { return view('pages.about', $this->base()); }
    public function fleet(): View { return view('pages.fleet', $this->base() + ['vehicles' => Vehicle::with('category')->where('status', 'Published')->get(), 'categories' => TrinetraData::fleetCategories()]); }
    public function vehicle(string $slug): View { return view('pages.vehicle', $this->base() + ['vehicle' => Vehicle::with('category')->where('slug', $slug)->firstOrFail(), 'similar' => Vehicle::where('slug', '!=', $slug)->take(3)->get()]); }
    public function services(): View { return view('pages.services', $this->base() + ['services' => Service::where('status', 'Published')->orderBy('order')->get()]); }
    public function service(string $slug): View { return view('pages.service', $this->base() + ['service' => Service::where('slug', $slug)->firstOrFail(), 'related' => Service::where('slug', '!=', $slug)->take(4)->get()]); }
    public function locations(): View { return view('pages.locations', $this->base() + ['locations' => Location::where('active', true)->get()]); }
    public function location(string $slug): View { return view('pages.location', $this->base() + ['location' => Location::where('slug', $slug)->firstOrFail()]); }
    public function tours(): View { return view('pages.tours', $this->base() + ['tours' => Tour::where('status', 'Published')->get()]); }
    public function tour(string $slug): View { return view('pages.tour', $this->base() + ['tour' => Tour::where('slug', $slug)->firstOrFail()]); }
    public function clientsGallery(): View { return view('pages.clients-gallery', $this->base()); }
    public function gallery(): View { return view('pages.gallery', $this->base()); }
    public function blog(): View { return view('pages.blog', $this->base() + ['posts' => BlogPost::with('category')->get(), 'categories' => TrinetraData::blogCategories()]); }
    public function post(string $slug): View { return view('pages.blog-post', $this->base() + ['post' => BlogPost::with('category')->where('slug', $slug)->firstOrFail()]); }
    public function careers(): View { return view('pages.careers', $this->base() + ['jobs' => Career::where('status', 'Published')->get()]); }
    public function career(string $slug): View { return view('pages.career', $this->base() + ['job' => Career::where('slug', $slug)->firstOrFail()]); }
    public function contact(): View { return view('pages.contact', $this->base()); }
    public function quote(): View { return view('pages.quote', $this->base()); }
    public function legalIndex(): View { return view('pages.legal-index', $this->base() + ['legalPages' => LegalPage::all()]); }
    public function legal(string $slug): View { return view('pages.legal', $this->base() + ['page' => LegalPage::where('slug', $slug)->firstOrFail()]); }
    public function success(string $reference): View { return view('pages.success', $this->base() + ['reference' => $reference]); }
    public function sitemapPage(): View { return view('pages.sitemap-page', $this->base() + ['links' => $this->links()]); }
    public function robots(): Response { return response("User-agent: *\nAllow: /\nSitemap: ".url('/sitemap.xml')."\n", 200, ['Content-Type' => 'text/plain']); }
    public function sitemapXml(): Response
    {
        return response()->view('pages.sitemap-xml', $this->base() + ['links' => $this->links()])->header('Content-Type', 'application/xml');
    }

    private function base(): array
    {
        return [
            'site' => TrinetraData::site(),
            'images' => TrinetraData::images(),
            'industries' => TrinetraData::industries(),
            'servicesList' => Service::where('status', 'Published')->orderBy('order')->get(),
            'vehiclesList' => Vehicle::where('status', 'Published')->get(),
            'locationsList' => Location::where('active', true)->get(),
            'fleetCategories' => TrinetraData::fleetCategories(),
        ];
    }

    private function links(): array
    {
        return array_merge(
            ['/', '/about', '/fleet', '/services', '/locations', '/tours', '/clients-gallery', '/gallery', '/blog', '/careers', '/contact', '/request-a-quote', '/legal'],
            Vehicle::pluck('slug')->map(fn ($s) => '/fleet/'.$s)->all(),
            Service::pluck('slug')->map(fn ($s) => '/services/'.$s)->all(),
            Location::where('active', true)->pluck('slug')->map(fn ($s) => '/locations/'.$s)->all(),
            Tour::pluck('slug')->map(fn ($s) => '/tours/'.$s)->all(),
            BlogPost::pluck('slug')->map(fn ($s) => '/blog/'.$s)->all(),
            LegalPage::pluck('slug')->map(fn ($s) => '/legal/'.$s)->all()
        );
    }
}
