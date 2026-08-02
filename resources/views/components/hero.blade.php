@props(['title', 'eyebrow' => null, 'image' => '/images/web/hero-luxury-car.jpg'])
<section class="relative overflow-hidden bg-navy text-white">
    <img src="{{ asset($image) }}" alt="" class="absolute inset-0 h-full w-full object-cover opacity-40">
    <div class="absolute inset-0 bg-gradient-to-r from-navy via-navy/80 to-navy/45"></div>
    <div class="relative mx-auto max-w-7xl px-4 py-20 md:py-28">
        @if($eyebrow)<p class="text-sm font-semibold uppercase tracking-[0.2em] text-gold">{{ $eyebrow }}</p>@endif
        <h1 class="mt-4 max-w-4xl text-4xl font-semibold leading-tight md:text-6xl">{{ $title }}</h1>
        @if($slot->isNotEmpty())<div class="mt-6 max-w-2xl text-lg leading-8 text-slate-100">{{ $slot }}</div>@endif
    </div>
</section>
