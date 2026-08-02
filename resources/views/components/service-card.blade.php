@props(['service'])
<a href="{{ route('services.show',$service->slug) }}" class="group rounded border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-soft">
    <div class="text-gold">●</div>
    <h3 class="mt-5 text-xl font-semibold text-navy">{{ $service->title }}</h3>
    <p class="mt-3 text-sm leading-6 text-steel">{{ $service->summary }}</p>
    <span class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-gold">View service →</span>
</a>
