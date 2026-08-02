@props(['vehicle'])
<article class="overflow-hidden rounded border border-slate-200 bg-white shadow-sm">
    <div class="relative aspect-[16/10]"><img src="{{ asset($vehicle->image) }}" alt="{{ $vehicle->name }} category vehicle visual" class="h-full w-full object-cover"></div>
    <div class="p-5">
        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-gold">{{ optional($vehicle->category)->name }}</p>
        <h3 class="mt-2 text-xl font-semibold text-navy">{{ $vehicle->name }}</h3>
        <dl class="mt-4 grid grid-cols-2 gap-3 text-sm text-steel">
            <div><dt class="font-semibold text-ink">Passengers</dt><dd>{{ $vehicle->passenger_capacity }}</dd></div>
            <div><dt class="font-semibold text-ink">Luggage</dt><dd>{{ $vehicle->luggage_capacity }}</dd></div>
            <div><dt class="font-semibold text-ink">Transmission</dt><dd>{{ $vehicle->transmission }}</dd></div>
            <div><dt class="font-semibold text-ink">Fuel</dt><dd>{{ $vehicle->fuel_type }}</dd></div>
        </dl>
        <div class="mt-5 flex gap-3">
            <a href="{{ route('fleet.show',$vehicle->slug) }}" class="rounded border border-slate-200 px-4 py-2 text-sm font-semibold">View Details</a>
            <a href="{{ route('quote',['vehicle'=>$vehicle->slug]) }}" class="rounded bg-navy px-4 py-2 text-sm font-semibold text-white">Request Quote</a>
        </div>
    </div>
</article>
