@props(['compact' => false, 'defaultService' => ''])
<form method="POST" action="{{ route('forms.quote') }}" class="rounded border border-white/20 bg-white text-ink shadow-soft {{ $compact ? 'self-start p-4 lg:sticky lg:top-28' : 'p-5' }}">
    @csrf
    <h2 class="{{ $compact ? 'text-lg' : 'text-xl' }} font-semibold text-navy">{{ $compact ? 'Request a Callback' : 'Quick Enquiry' }}</h2>
    @if($compact)<p class="mt-2 text-sm leading-6 text-steel">Share basic details. Route, date and vehicle mix can be confirmed during follow-up.</p>@endif
    <div class="mt-4 grid gap-3 {{ $compact ? '' : 'md:grid-cols-2' }}">
        <label class="text-sm">Service required
            <select name="service_type" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required>
                <option value="">Select</option>
                @foreach($servicesList as $service)<option @selected(old('service_type',$defaultService)===$service->title)>{{ $service->title }}</option>@endforeach
            </select>
        </label>
        @if(!$compact)
            <label class="text-sm">Vehicle category<select name="vehicle_preference" class="mt-1 w-full rounded border border-slate-300 px-3 py-2">@foreach($fleetCategories as $category)<option>{{ $category['name'] }}</option>@endforeach</select></label>
            <label class="text-sm">Pickup location<input name="pickup_location" value="{{ old('pickup_location') }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required></label>
            <label class="text-sm">Destination<input name="destination" value="{{ old('destination') }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required></label>
            <label class="text-sm">Pickup date<input name="pickup_date" type="date" value="{{ old('pickup_date') }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required></label>
            <label class="text-sm">Return date<input name="return_date" type="date" value="{{ old('return_date') }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"></label>
            <label class="text-sm">Passengers<input name="passenger_count" type="number" min="1" value="{{ old('passenger_count',1) }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"></label>
        @else
            <input type="hidden" name="pickup_location" value="To be discussed">
            <input type="hidden" name="destination" value="To be discussed">
            <input type="hidden" name="pickup_date" value="{{ now()->toDateString() }}">
            <input type="hidden" name="passenger_count" value="1">
        @endif
        <label class="text-sm">Full name<input name="full_name" value="{{ old('full_name') }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required></label>
        @if(!$compact)<label class="text-sm">Company name<input name="company_name" value="{{ old('company_name') }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"></label>@endif
        <label class="text-sm">Phone<input name="phone" value="{{ old('phone') }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required></label>
        <label class="text-sm">Email<input name="email" type="email" value="{{ old('email') }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required></label>
        <label class="{{ $compact ? '' : 'md:col-span-2' }} text-sm">Additional requirements<textarea name="special_requirements" class="mt-1 w-full rounded border border-slate-300 px-3 py-2 {{ $compact ? 'min-h-16' : 'min-h-20' }}">{{ old('special_requirements') }}</textarea></label>
    </div>
    <input type="hidden" name="customer_type" value="Corporate">
    <input type="hidden" name="trip_type" value="One-way">
    <input type="hidden" name="number_of_vehicles" value="1">
    <label class="mt-4 flex gap-2 text-xs text-steel"><input type="checkbox" name="consent" value="1" required> I consent to be contacted about this enquiry.</label>
    @if($errors->any())<p class="mt-3 text-sm text-red-600">{{ $errors->first() }}</p>@endif
    <button class="mt-4 w-full rounded bg-navy px-4 py-3 font-semibold text-white">{{ $compact ? 'Send Request' : 'Submit Enquiry' }}</button>
</form>
