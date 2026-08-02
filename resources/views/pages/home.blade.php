@extends('layouts.app')
@section('content')
<section class="relative overflow-hidden bg-navy text-white">
    <img src="{{ asset($images['hero']) }}" alt="Luxury chauffeur-driven vehicle for corporate mobility" class="absolute inset-0 h-full w-full object-cover opacity-40">
    <div class="absolute inset-0 bg-navy/55"></div>
    <div class="relative mx-auto grid max-w-7xl gap-10 px-4 py-20 lg:grid-cols-[1.05fr_0.95fr] lg:py-28">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-gold">Corporate mobility and fleet solutions</p>
            <h1 class="mt-5 text-5xl font-semibold leading-tight md:text-7xl">{{ $site['tagline'] }}</h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-100">{{ $site['description'] }}</p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('quote') }}" class="rounded bg-gold px-6 py-3 font-semibold text-white">Request a Quote</a>
                <a href="{{ route('fleet.index') }}" class="rounded border border-white/40 px-6 py-3 font-semibold text-white">Explore Our Fleet</a>
                <a href="tel:{{ $site['phone'] }}" class="rounded border border-white/40 px-4 py-3">Call</a>
            </div>
        </div>
        @include('forms.quick-enquiry', ['compact' => false])
    </div>
</section>
<x-section title="Mobility Coverage Built Around Business Movement" eyebrow="Trust indicators">
    <div class="grid gap-4 md:grid-cols-4">@foreach(['Placeholder certifications','Verified chauffeur workflow','Corporate billing ready','NCR operating focus'] as $item)<div class="rounded border border-slate-200 bg-white p-5"><p class="font-semibold">{{ $item }}</p></div>@endforeach</div>
</x-section>
<x-section title="Core Services" eyebrow="What we manage"><div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">@foreach($servicesList->take(9) as $service)<x-service-card :service="$service" />@endforeach</div></x-section>
<x-section title="Featured Fleet Categories" eyebrow="Vehicle allocation"><div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">@foreach($vehiclesList->take(6) as $vehicle)<x-fleet-card :vehicle="$vehicle" />@endforeach</div></x-section>
<x-section title="Industries Served" eyebrow="Customer segments"><div class="flex flex-wrap gap-3">@foreach($industries as $industry)<span class="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm">{{ $industry }}</span>@endforeach</div></x-section>
<x-section title="Operational Locations" eyebrow="Active city pages"><div class="grid gap-4 md:grid-cols-3 lg:grid-cols-4">@foreach($locationsList as $location)<a href="{{ route('locations.show',$location->slug) }}" class="rounded border border-slate-200 bg-white p-5 font-semibold">{{ $location->name }}</a>@endforeach</div></x-section>
@endsection
