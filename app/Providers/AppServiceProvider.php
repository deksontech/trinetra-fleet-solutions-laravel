<?php

namespace App\Providers;

use App\Models\Location;
use App\Models\Service;
use App\Models\Vehicle;
use App\Support\TrinetraData;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}
    public function boot(): void
    {
        View::composer('*', function ($view) {
            try {
                $services = Service::where('status', 'Published')->orderBy('order')->get();
                $vehicles = Vehicle::where('status', 'Published')->get();
                $locations = Location::where('active', true)->get();
            } catch (\Throwable) {
                $services = collect();
                $vehicles = collect();
                $locations = collect();
            }

            $view->with([
                'site' => TrinetraData::site(),
                'images' => TrinetraData::images(),
                'industries' => TrinetraData::industries(),
                'servicesList' => $services,
                'vehiclesList' => $vehicles,
                'locationsList' => $locations,
                'fleetCategories' => TrinetraData::fleetCategories(),
            ]);
        });
    }
}
