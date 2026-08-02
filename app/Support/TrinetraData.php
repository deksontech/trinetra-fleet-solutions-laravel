<?php

namespace App\Support;

use Illuminate\Support\Str;

class TrinetraData
{
    public static function site(): array
    {
        return [
            'name' => 'Trinetra Fleet Solutions',
            'legal_name' => 'M/s Trinetra Fleet Solutions',
            'tagline' => 'Reliable Mobility. Professionally Managed.',
            'description' => 'Corporate transportation, chauffeur-driven vehicles, premium rentals, employee mobility and complete ground transportation solutions for businesses, institutions, events and individuals.',
            'phone' => env('TRINETRA_PHONE', '+91 85880 40321'),
            'email' => env('TRINETRA_EMAIL', 'jitendra@trinetrafleet.com'),
            'address' => env('TRINETRA_ADDRESS', '[Add office address]'),
            'whatsapp' => env('TRINETRA_WHATSAPP', '918588040321'),
            'logo' => '/images/trinetra-logo.png',
            'established' => '2026',
        ];
    }

    public static function images(): array
    {
        return [
            'hero' => '/images/web/hero-luxury-car.jpg',
            'luxury' => '/images/web/luxury-sedan.jpg',
            'executive' => '/images/web/executive-car.jpg',
            'suv' => '/images/web/premium-suv.jpg',
            'airport' => '/images/web/airport-transfer.jpg',
            'road' => '/images/web/outstation-road.jpg',
            'interior' => '/images/web/car-interior.jpg',
            'coach' => '/images/web/coach-bus.jpg',
            'corporate' => '/images/web/business-district-car.jpg',
            'event' => '/images/web/event-transport.jpg',
        ];
    }

    public static function industries(): array
    {
        return ['Corporate companies', 'IT and ITES companies', 'BPO and KPO companies', 'Manufacturing companies', 'Hotels and resorts', 'Hospitals', 'Educational institutions', 'Government organisations', 'Airlines', 'Travel agencies', 'Event companies', 'Wedding planners', 'Senior executives', 'VIP travellers', 'Families and tourists'];
    }

    public static function fleetCategories(): array
    {
        return [
            ['slug' => 'luxury-cars', 'name' => 'Luxury Cars', 'capacity' => '2-4 passengers'],
            ['slug' => 'premium-suvs', 'name' => 'Premium SUVs', 'capacity' => '4-6 passengers'],
            ['slug' => 'executive-cars', 'name' => 'Executive Cars', 'capacity' => '2-4 passengers'],
            ['slug' => 'sedans', 'name' => 'Sedans', 'capacity' => '2-4 passengers'],
            ['slug' => 'mini-vans-and-muvs', 'name' => 'Mini Vans and MUVs', 'capacity' => '5-8 passengers'],
            ['slug' => 'tempo-travellers', 'name' => 'Tempo Travellers', 'capacity' => '9-17 passengers'],
            ['slug' => 'coaches-and-buses', 'name' => 'Coaches and Buses', 'capacity' => '18-45 passengers'],
            ['slug' => 'electric-vehicles', 'name' => 'Electric Vehicles', 'capacity' => 'Subject to allocation'],
        ];
    }

    public static function vehicles(): array
    {
        $images = self::images();
        $exact = [
            'mercedes-benz-s-class' => '/images/vehicles/mercedes-benz-s-class.jpg',
            'bmw-7-series' => '/images/vehicles/bmw-7-series.jpg',
            'audi-a8' => '/images/vehicles/audi-a8.jpg',
            'mercedes-benz-e-class' => '/images/vehicles/mercedes-benz-e-class.jpg',
            'bmw-5-series' => '/images/vehicles/bmw-5-series.jpg',
            'toyota-camry' => '/images/vehicles/toyota-camry.jpg',
            'honda-city' => '/images/vehicles/honda-city.jpg',
            'hyundai-verna' => '/images/vehicles/hyundai-verna.jpg',
            'maruti-suzuki-ciaz' => '/images/vehicles/maruti-suzuki-ciaz.jpg',
            'toyota-corolla-or-equivalent' => '/images/vehicles/toyota-corolla-or-equivalent.jpg',
            'toyota-fortuner' => '/images/vehicles/toyota-fortuner.jpg',
            'toyota-innova-crysta' => '/images/vehicles/toyota-innova-crysta.jpg',
            'toyota-innova-hycross' => '/images/vehicles/toyota-innova-hycross.jpg',
            'kia-carnival' => '/images/vehicles/kia-carnival.jpg',
            'mahindra-scorpio-n' => '/images/vehicles/mahindra-scorpio-n.jpg',
            'mahindra-xuv700' => '/images/vehicles/mahindra-xuv700.jpg',
            'tempo-traveller' => '/images/vehicles/tempo-traveller.jpg',
            'toyota-hiace' => '/images/vehicles/toyota-hiace.jpg',
            'mini-bus' => '/images/vehicles/mini-bus.jpg',
            'toyota-coaster' => '/images/vehicles/toyota-coaster.jpg',
            'luxury-coach' => '/images/vehicles/luxury-coach.jpg',
            'volvo-coach' => '/images/vehicles/volvo-coach.jpg',
            'staff-bus' => '/images/vehicles/staff-bus.jpg',
            'electric-bus' => '/images/vehicles/electric-bus.jpg',
        ];
        $rows = [
            'Mercedes-Benz S-Class|luxury-cars|3|3|Automatic|Petrol/Hybrid|VIP delegation, executive chauffeur',
            'BMW 7 Series|luxury-cars|3|3|Automatic|Petrol/Hybrid|Board movement, premium airport transfer',
            'Audi A8|luxury-cars|3|3|Automatic|Petrol/Hybrid|Leadership travel, protocol movement',
            'Mercedes-Benz E-Class|luxury-cars|3|3|Automatic|Petrol/Diesel|Executive rental, hotel travel desk',
            'BMW 5 Series|luxury-cars|3|3|Automatic|Petrol/Diesel|Executive chauffeur, long-term lease',
            'Toyota Camry|executive-cars|3|3|Automatic|Hybrid|Corporate car rental, airport transfer',
            'Honda City|sedans|3|2|Manual/Automatic|Petrol|Local travel, monthly rental',
            'Hyundai Verna|sedans|3|2|Manual/Automatic|Petrol|Employee transportation, one-way cab',
            'Maruti Suzuki Ciaz|sedans|3|2|Manual/Automatic|Petrol|Corporate commute, local rental',
            'Toyota Corolla or equivalent|sedans|3|2|Automatic|Petrol|Executive sedan assignments',
            'Toyota Fortuner|premium-suvs|5|4|Automatic|Diesel|Outstation travel, VIP movement',
            'Toyota Innova Crysta|mini-vans-and-muvs|6|4|Manual/Automatic|Diesel|Airport transfer, family travel',
            'Toyota Innova Hycross|mini-vans-and-muvs|6|4|Automatic|Hybrid|Corporate travel, premium MUV',
            'Kia Carnival|mini-vans-and-muvs|6|5|Automatic|Diesel|Delegations, wedding family movement',
            'Mahindra Scorpio N|premium-suvs|6|3|Manual/Automatic|Diesel|Regional travel, project movement',
            'Mahindra XUV700|premium-suvs|5|3|Manual/Automatic|Petrol/Diesel|Executive SUV, outstation',
            'Force Urbania|tempo-travellers|10|8|Manual|Diesel|Group transportation, events',
            'Tempo Traveller|tempo-travellers|12-17|10|Manual|Diesel|Employee shuttles, tours',
            'Toyota HiAce|tempo-travellers|10|8|Automatic|Diesel|Premium group movement',
            'Mini Bus|coaches-and-buses|18-27|20|Manual|Diesel|Staff movement, conference shuttle',
            'Toyota Coaster|coaches-and-buses|20-25|18|Manual|Diesel|Tour group, hotel movement',
            'Luxury Coach|coaches-and-buses|35-45|30|Manual|Diesel|Events, long-distance groups',
            'Volvo Coach|coaches-and-buses|35-45|30|Manual|Diesel|Premium tours, corporate offsites',
            'Staff Bus|coaches-and-buses|32-45|20|Manual|Diesel/CNG|Employee transportation',
            'Electric Bus|electric-vehicles|25-35|Subject to model|Automatic|Electric|Configurable staff movement',
        ];

        return array_map(function ($row) use ($images, $exact) {
            [$name, $category, $passengers, $luggage, $transmission, $fuel, $suitable] = explode('|', $row);
            $slug = Str::slug($name);
            $categoryImage = match ($category) {
                'luxury-cars' => $images['luxury'],
                'premium-suvs' => $images['suv'],
                'coaches-and-buses' => $images['coach'],
                'tempo-travellers', 'mini-vans-and-muvs' => $images['airport'],
                'electric-vehicles' => $images['corporate'],
                'executive-cars' => $images['executive'],
                default => $images['road'],
            };
            return [
                'slug' => $slug,
                'name' => $name,
                'category' => $category,
                'passengers' => $passengers,
                'luggage' => $luggage,
                'transmission' => $transmission,
                'fuel' => $fuel,
                'suitable' => array_map('trim', explode(',', $suitable)),
                'features' => ['Professional chauffeur', 'Clean cabin', 'Corporate billing ready', 'Equivalent replacement may be assigned'],
                'image' => $exact[$slug] ?? $categoryImage,
                'disclaimer' => 'Availability is subject to city, date, contract terms and fleet allocation. Equivalent vehicles may be offered.',
            ];
        }, $rows);
    }

    public static function services(): array
    {
        $images = self::images();
        $rows = [
            ['chauffeur-driven-cars-and-coaches', 'Chauffeur-Driven Cars and Coaches', 'Local, corporate, outstation, executive and group transportation with professional chauffeurs and dedicated coordination.'],
            ['employee-transportation', 'Employee Transportation Services', 'Shift transportation, office shuttles, route planning, driver verification, reporting and emergency coordination for employers.'],
            ['long-term-car-leasing', 'Long-Term Car Leasing', 'Monthly and annual corporate vehicle deployment with chauffeur, replacement support and maintenance coordination.'],
            ['wedding-transportation', 'Wedding Transportation', 'Bridal cars, guest movement, luxury buses, airport transfers and multi-venue coordination.'],
            ['airport-transfer', 'Airport Transfer Services', 'Airport pickup, drop, meet-and-greet, guest placards, hotel transfers and delayed-flight coordination where integrated.'],
            ['vip-delegations', 'VIP Delegations', 'Protocol-aware executive movement with premium vehicles, lead and backup planning and confidential coordination.'],
            ['events-and-conferences', 'Events and Conferences', 'Delegate transport, venue shuttles, airport and hotel movement, transport desks, backup vehicles and schedules.'],
            ['self-drive-car-rental', 'Self-Drive Car Rental', 'Optional CMS-controlled page for daily, weekly and monthly self-drive rental enquiries without payment or booking engine.'],
            ['hotel-travel-desk', 'Hotel Travel Desk', 'On-site transport desks, guest transfers, sightseeing, VIP vehicles, monthly billing and round-the-clock support.'],
            ['air-travel-assistance', 'Air Travel Assistance', 'Optional flight reservation assistance, group itinerary support and ground transport coordination.'],
            ['airline-crew-transportation', 'Airline Crew Transportation', 'Scheduled airport-hotel crew movement, dedicated vehicles, backup planning and monthly airline contracts.'],
            ['corporate-car-rental', 'Corporate Car Rental', 'Cars, MUVs and coaches for procurement, HR, admin, guest relations and leadership teams.'],
            ['monthly-car-rental', 'Monthly Car Rental', 'Monthly vehicle packages for projects, executives, sites and recurring business movement.'],
            ['outstation-cab-service', 'Outstation Cab Service', 'Intercity travel with suitable sedans, SUVs, MUVs and coaches for business or leisure routes.'],
            ['one-way-cab-service', 'One-Way Cab Service', 'Planned one-way intercity cab enquiries with clear route, timing and vehicle requirement capture.'],
            ['local-car-rental', 'Local Car Rental', 'Hourly and full-day local chauffeur-driven vehicle rentals for meetings, errands and guest movement.'],
            ['executive-chauffeur-service', 'Executive Chauffeur Service', 'Discreet chauffeur-driven cars for senior executives, visiting directors and VIP guests.'],
            ['group-transportation', 'Group Transportation', 'MUVs, travellers, mini buses and coaches for tours, offsites, weddings, staff and delegations.'],
            ['fleet-outsourcing', 'Fleet Outsourcing', 'Managed fleet deployment for organisations that need vehicles, chauffeurs and operational oversight.'],
            ['transport-management-services', 'Transport Management Services', 'Central coordination, fleet allocation, reporting and process management for recurring transport needs.'],
        ];
        return array_map(function ($row, $index) use ($images) {
            [$slug, $title, $summary] = $row;
            $image = str_contains($slug, 'airport') || str_contains($slug, 'airline') || str_contains($slug, 'air-travel') ? $images['airport']
                : (str_contains($slug, 'event') || str_contains($slug, 'wedding') || str_contains($slug, 'delegation') ? $images['event']
                : (str_contains($slug, 'employee') || str_contains($slug, 'group') || str_contains($slug, 'coach') ? $images['coach']
                : (str_contains($slug, 'outstation') || str_contains($slug, 'one-way') ? $images['road']
                : (str_contains($slug, 'self-drive') || str_contains($slug, 'local') ? $images['executive'] : $images['corporate']))));
            return [
                'slug' => $slug,
                'title' => $title,
                'summary' => $summary,
                'optional' => in_array($slug, ['self-drive-car-rental', 'air-travel-assistance'], true),
                'image' => $image,
                'features' => ['Requirement mapping and itinerary review', 'Suitable vehicle category recommendation', 'Verified chauffeur and vehicle documentation workflow', 'Dedicated coordinator for business assignments', 'Corporate billing and reporting support where contracted', 'WhatsApp and email enquiry follow-up'],
                'process' => ['Share requirement', 'Confirm route and vehicle mix', 'Receive quotation', 'Approve deployment', 'Travel with coordination support'],
                'faqs' => [
                    ['question' => "Can Trinetra Fleet Solutions support recurring ".strtolower($title).'?', 'answer' => 'Yes. Recurring requirements can be structured as monthly, annual or project-based contracts after requirement review.'],
                    ['question' => 'Do you take payment online?', 'answer' => 'No. The website captures enquiries and quotation requests only; payment workflows are intentionally excluded.'],
                ],
                'order' => $index + 1,
            ];
        }, $rows, array_keys($rows));
    }

    public static function locations(): array
    {
        $rows = [
            'Gurugram|North|Cyber City, Golf Course Road, Sohna Road and Manesar business movement.',
            'Delhi|North|Airport transfers, corporate offices, hotels, embassies and institutional travel.',
            'Noida|North|IT parks, expressway offices, hospitals, education campuses and event movement.',
            'Greater Noida|North|Expo, industrial, education, sports and regional transport assignments.',
            'Faridabad|North|Manufacturing clusters, corporate sites and NCR intercity movement.',
            'Manesar|North|Industrial employee transportation, executive visits and project vehicles.',
            'Rewari|North|Industrial, education and regional staff movement requirements.',
            'Bhiwadi|North|Manufacturing, plant visits and recurring transport coordination.',
            'Neemrana|North|Industrial corridor travel, staff movement and executive site visits.',
            'Jaipur|North West|Airport transfer, tours, events, hotels and corporate travel.',
            'Chandigarh|North|Government, corporate, education, hotel and airport transfers.',
        ];
        return array_map(function ($row) {
            [$name, $region, $intro] = explode('|', $row);
            return [
                'slug' => Str::slug($name),
                'name' => $name,
                'region' => $region,
                'intro' => $intro,
                'active' => true,
                'hubs' => ['Business districts', 'Hotels', 'Airports and railway stations', 'Industrial zones'],
                'routes' => ["{$name} local rental", "{$name} airport transfer", "{$name} to Delhi NCR", "{$name} outstation cab"],
            ];
        }, $rows);
    }

    public static function tours(): array
    {
        $rows = [
            'delhi-city-tour|Delhi City Tour|Full-day or custom Delhi sightseeing with chauffeur-driven cars.',
            'gurugram-and-delhi-sightseeing|Gurugram and Delhi Sightseeing|Flexible NCR sightseeing for guests, families and business visitors.',
            'same-day-agra-tour|Same-Day Agra Tour|Private chauffeur-driven same-day Agra itinerary from Delhi NCR.',
            'golden-triangle-tour|Golden Triangle Tour|Delhi, Agra and Jaipur ground transport with suitable vehicles.',
            'jaipur-city-tour|Jaipur City Tour|Private Jaipur sightseeing with sedan, MUV or traveller options.',
            'mathura-and-vrindavan-tour|Mathura and Vrindavan Tour|Same-day or overnight religious and family travel support.',
            'haridwar-and-rishikesh-tour|Haridwar and Rishikesh Tour|Outstation road travel with comfortable vehicles.',
            'chandigarh-tour|Chandigarh Tour|Corporate, family and leisure travel to Chandigarh and nearby areas.',
            'rajasthan-tour|Rajasthan Tour|Custom Rajasthan itineraries with cars, travellers and coaches.',
            'char-dham-yatra|Char Dham Yatra|Customised pilgrimage transport enquiry support.',
            'customized-tour-packages|Customized Tour Packages|Tailored tours based on route, passenger count and schedule.',
        ];
        return array_map(function ($row) {
            [$slug, $title, $summary] = explode('|', $row);
            return [
                'slug' => $slug,
                'title' => $title,
                'summary' => $summary,
                'duration' => str_contains($slug, 'same-day') ? 'Same day' : 'Custom duration',
                'itinerary' => ['Pickup as scheduled', 'Route and stops as confirmed', 'Breaks and local movement', 'Return or onward drop'],
                'inclusions' => ['Chauffeur-driven vehicle', 'Route coordination', 'Vehicle category as quoted'],
                'exclusions' => ['Parking, tolls and taxes unless quoted', 'Guide, tickets, hotel and meals unless included'],
                'notes' => ['Prices are not shown until verified rate data is added.', 'Final quotation depends on route, date, vehicle category and duration.'],
            ];
        }, $rows);
    }

    public static function blogCategories(): array
    {
        return ['Corporate Mobility', 'Fleet Management', 'Employee Transportation', 'Business Travel', 'Airport Transfers', 'Road Travel', 'Vehicle Guides', 'Safety', 'Events and Conferences', 'Travel Guides'];
    }

    public static function posts(): array
    {
        return [
            ['slug' => 'employee-transportation-best-practices', 'title' => 'Employee Transportation Best Practices for Growing Companies', 'category' => 'Employee Transportation'],
            ['slug' => 'choosing-vehicles-for-corporate-events', 'title' => 'How to Choose Vehicles for Corporate Events', 'category' => 'Events and Conferences'],
            ['slug' => 'airport-transfer-planning-checklist', 'title' => 'Airport Transfer Planning Checklist for Guest Travel', 'category' => 'Airport Transfers'],
            ['slug' => 'monthly-car-rental-vs-spot-rental', 'title' => 'Monthly Car Rental vs Spot Rental for Businesses', 'category' => 'Fleet Management'],
        ];
    }

    public static function legalPages(): array
    {
        return [
            ['slug' => 'privacy-policy', 'title' => 'Privacy Policy'],
            ['slug' => 'terms-of-service', 'title' => 'Terms of Service'],
            ['slug' => 'cookie-policy', 'title' => 'Cookie Policy'],
            ['slug' => 'disclaimer', 'title' => 'Disclaimer'],
            ['slug' => 'cancellation-policy', 'title' => 'Cancellation Policy'],
            ['slug' => 'rental-terms', 'title' => 'Rental Terms'],
            ['slug' => 'chauffeur-driven-service-terms', 'title' => 'Chauffeur-Driven Service Terms'],
            ['slug' => 'self-drive-terms', 'title' => 'Self-Drive Terms'],
            ['slug' => 'corporate-transport-disclaimer', 'title' => 'Corporate Transport Disclaimer'],
        ];
    }

    public static function jobs(): array
    {
        return [
            ['slug' => 'professional-chauffeur', 'title' => 'Professional Chauffeur', 'type' => 'Driver Recruitment', 'location' => 'Delhi NCR'],
            ['slug' => 'fleet-coordinator', 'title' => 'Fleet Coordinator', 'type' => 'Operations', 'location' => 'Gurugram'],
            ['slug' => 'corporate-sales-executive', 'title' => 'Corporate Sales Executive', 'type' => 'Sales', 'location' => 'Delhi NCR'],
            ['slug' => 'admin-associate', 'title' => 'Administrative Associate', 'type' => 'Administrative', 'location' => 'Delhi NCR'],
        ];
    }

    public static function galleryCategories(): array
    {
        return ['Fleet Gallery', 'Event Gallery', 'Corporate Transportation Gallery', 'Wedding Transportation Gallery', 'Airport Transfer Gallery', 'Video Gallery'];
    }

    public static function adminModules(): array
    {
        return ['Dashboard', 'Leads', 'Fleet Categories', 'Vehicles', 'Services', 'Locations', 'Tours', 'Client Logos', 'Testimonials', 'Gallery', 'Videos', 'Careers', 'Job Applications', 'Blogs', 'Blog Categories', 'FAQs', 'Legal Pages', 'SEO Settings', 'Website Settings', 'Contact Details', 'Admin Users', 'Roles and Permissions', 'Audit Logs'];
    }
}
