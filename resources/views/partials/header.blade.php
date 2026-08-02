<header class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur" x-data="{open:false}">
    <div class="border-b border-slate-100 bg-navy text-xs text-white">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-3 px-4 py-2">
            <span>Professionally managed corporate mobility and fleet solutions</span>
            <div class="flex items-center gap-4">
                <a href="tel:{{ $site['phone'] }}">{{ $site['phone'] }}</a>
                <a href="mailto:{{ $site['email'] }}">{{ $site['email'] }}</a>
            </div>
        </div>
    </div>
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <span class="relative grid h-12 w-12 place-items-center overflow-hidden rounded border border-slate-200 bg-white">
                <img src="{{ asset($site['logo']) }}" alt="{{ $site['name'] }} logo" class="h-full w-full object-contain p-1">
            </span>
            <span>
                <span class="block text-base font-semibold tracking-wide text-navy">{{ $site['name'] }}</span>
                <span class="block text-xs text-steel">{{ $site['tagline'] }}</span>
            </span>
        </a>
        <nav class="hidden items-center gap-5 text-sm font-medium lg:flex">
            @foreach([['Home','home'],['About Us','about'],['Our Fleet','fleet.index'],['Services','services.index'],['Locations','locations.index'],['Tours','tours.index'],['Clients & Gallery','clients-gallery'],['Blog','blog.index'],['Contact Us','contact']] as [$label,$route])
                <a href="{{ route($route) }}" class="rounded-sm py-3 text-ink hover:text-gold">{{ $label }}</a>
            @endforeach
        </nav>
        <div class="hidden items-center gap-2 lg:flex">
            <a class="rounded border border-slate-200 px-4 py-3 text-sm font-semibold" href="https://wa.me/{{ $site['whatsapp'] }}?text={{ urlencode('Hello '.$site['name'].', I would like a quotation.') }}">WhatsApp</a>
            <a href="{{ route('quote') }}" class="rounded bg-gold px-5 py-3 text-sm font-semibold text-white shadow-soft">Request a Quote</a>
        </div>
        <button class="rounded border border-slate-200 p-2 lg:hidden" @click="open=!open" aria-label="Toggle menu">☰</button>
    </div>
    <div x-show="open" class="border-t border-slate-200 bg-white px-4 py-4 lg:hidden">
        <nav class="grid gap-2">
            @foreach([['Home','home'],['About Us','about'],['Our Fleet','fleet.index'],['Services','services.index'],['Locations','locations.index'],['Tours','tours.index'],['Clients & Gallery','clients-gallery'],['Blog','blog.index'],['Contact Us','contact']] as [$label,$route])
                <a href="{{ route($route) }}" class="rounded px-2 py-2 font-medium">{{ $label }}</a>
            @endforeach
            <a href="{{ route('quote') }}" class="rounded bg-gold px-4 py-3 text-center font-semibold text-white">Request a Quote</a>
        </nav>
    </div>
</header>
