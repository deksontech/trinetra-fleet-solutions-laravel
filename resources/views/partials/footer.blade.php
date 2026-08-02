<footer class="bg-navy text-white">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-14 md:grid-cols-4">
        <div>
            <div class="flex items-center gap-3">
                <span class="grid h-12 w-12 place-items-center overflow-hidden rounded bg-white"><img src="{{ asset($site['logo']) }}" alt="{{ $site['name'] }} logo" class="h-full w-full object-contain p-1"></span>
                <h2 class="text-xl font-semibold">{{ $site['name'] }}</h2>
            </div>
            <p class="mt-4 text-sm leading-6 text-slate-300">{{ $site['description'] }}</p>
        </div>
        <div>
            <h3 class="font-semibold">Services</h3>
            <ul class="mt-4 space-y-2 text-sm text-slate-300">@foreach($servicesList->take(10) as $service)<li><a href="{{ route('services.show',$service->slug) }}">{{ $service->title }}</a></li>@endforeach</ul>
        </div>
        <div>
            <h3 class="font-semibold">Fleet & Locations</h3>
            <ul class="mt-4 space-y-2 text-sm text-slate-300">
                <li><a href="{{ route('fleet.index') }}">Fleet Catalogue</a></li>
                @foreach($locationsList->take(6) as $location)<li><a href="{{ route('locations.show',$location->slug) }}">{{ $location->name }}</a></li>@endforeach
            </ul>
        </div>
        <div>
            <h3 class="font-semibold">Contact</h3>
            <p class="mt-4 text-sm text-slate-300">{{ $site['address'] }}</p>
            <p class="mt-2 text-sm text-slate-300">{{ $site['phone'] }}</p>
            <p class="mt-2 text-sm text-slate-300">{{ $site['email'] }}</p>
        </div>
    </div>
    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-4 py-5 text-xs text-slate-300">
            <p>© 2026 {{ $site['legal_name'] }}. All rights reserved.</p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('legal.show','privacy-policy') }}">Privacy Policy</a>
                <a href="{{ route('legal.show','terms-of-service') }}">Terms</a>
                <a href="{{ route('legal.show','cookie-policy') }}">Cookie Policy</a>
                <a href="{{ route('careers.index') }}">Careers</a>
            </div>
        </div>
    </div>
</footer>
