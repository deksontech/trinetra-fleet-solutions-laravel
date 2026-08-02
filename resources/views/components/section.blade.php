@props(['title', 'eyebrow' => null])
<section class="mx-auto max-w-7xl px-4 py-16">
    <div class="mb-9 max-w-3xl">
        @if($eyebrow)<p class="text-sm font-semibold uppercase tracking-[0.18em] text-gold">{{ $eyebrow }}</p>@endif
        <h2 class="mt-3 text-3xl font-semibold text-navy md:text-4xl">{{ $title }}</h2>
    </div>
    {{ $slot }}
</section>
