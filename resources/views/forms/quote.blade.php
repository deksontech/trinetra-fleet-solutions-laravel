<form method="POST" action="{{ route('forms.quote') }}" class="grid gap-4 rounded border border-slate-200 bg-white p-6 shadow-soft">
    @csrf
    <div class="grid gap-4 md:grid-cols-2">
        <label class="text-sm">Service type<select name="service_type" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required><option value="">Select</option>@foreach($servicesList as $service)<option>{{ $service->title }}</option>@endforeach</select></label>
        <label class="text-sm">Customer type<select name="customer_type" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"><option>Corporate</option><option>Individual</option></select></label>
        @foreach(['company_name'=>'Company name','full_name'=>'Full name','email'=>'Email','phone'=>'Phone','pickup_location'=>'Pickup location','destination'=>'Destination'] as $name=>$label)
            <label class="text-sm">{{ $label }}<input name="{{ $name }}" value="{{ old($name) }}" @if($name==='email') type="email" @endif class="mt-1 w-full rounded border border-slate-300 px-3 py-2" @if(!in_array($name,['company_name'])) required @endif></label>
        @endforeach
        <label class="text-sm">Trip type<select name="trip_type" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"><option>Local</option><option>One-way</option><option>Round trip</option><option>Outstation</option><option>Monthly</option><option>Event</option><option>Lease</option></select></label>
        <label class="text-sm">Pickup date<input name="pickup_date" type="date" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required></label>
        <label class="text-sm">Pickup time<input name="pickup_time" type="time" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"></label>
        <label class="text-sm">Return date<input name="return_date" type="date" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"></label>
        <label class="text-sm">Return time<input name="return_time" type="time" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"></label>
        <label class="text-sm">Passenger count<input name="passenger_count" type="number" min="1" value="1" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"></label>
        <label class="text-sm">Luggage count<input name="luggage_count" type="number" min="0" value="0" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"></label>
        <label class="text-sm">Vehicle preference<select name="vehicle_preference" class="mt-1 w-full rounded border border-slate-300 px-3 py-2">@foreach($fleetCategories as $category)<option>{{ $category['name'] }}</option>@endforeach</select></label>
        <label class="text-sm">Number of vehicles<input name="number_of_vehicles" type="number" min="1" value="1" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"></label>
        <label class="text-sm">Billing type<select name="billing_type" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"><option>Individual invoice</option><option>Corporate billing</option><option>Monthly contract</option><option>To be discussed</option></select></label>
        <label class="text-sm">Duration<input name="duration" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"></label>
    </div>
    <details class="rounded border border-slate-200 p-4"><summary class="font-semibold text-navy">Conditional details</summary>
        <div class="mt-4 grid gap-4 md:grid-cols-2">
            @foreach(['employee_count','number_of_shifts','office_locations','pickup_zones','contract_duration','required_vehicle_types','event_name','venue','event_dates','delegate_count','hotels','airports','coordinator_required','wedding_date','venues','guest_count','airport_transfers','luxury_car_requirement','bus_requirement','monthly_kilometres','chauffeur_required'] as $field)
                <label class="text-sm">{{ \Illuminate\Support\Str::headline($field) }}<input name="{{ $field }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"></label>
            @endforeach
        </div>
    </details>
    <label class="text-sm">Special requirements<textarea name="special_requirements" class="mt-1 min-h-28 w-full rounded border border-slate-300 px-3 py-2"></textarea></label>
    <label class="flex gap-2 text-sm text-steel"><input type="checkbox" name="consent" value="1" required> I consent to Trinetra Fleet Solutions contacting me about this enquiry.</label>
    @if($errors->any())<p class="text-sm text-red-600">{{ $errors->first() }}</p>@endif
    <button class="rounded bg-gold px-6 py-3 font-semibold text-white">Submit Quote Request</button>
</form>
