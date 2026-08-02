@extends('layouts.app')
@section('title','Fleet Catalogue | '.$site['name'])
@section('content')
<x-hero title="Fleet Catalogue" eyebrow="Our fleet" :image="$images['luxury']">Browse vehicle categories for chauffeur-driven rentals, corporate contracts, events, employee mobility and tours. Availability depends on city, date, contract and fleet allocation.</x-hero>
<x-section title="Search and Filter"><form class="grid gap-3 rounded border border-slate-200 bg-white p-5 md:grid-cols-3"><input name="q" placeholder="Search vehicles" class="rounded border border-slate-300 px-3 py-2"><select name="category" class="rounded border border-slate-300 px-3 py-2"><option value="">All categories</option>@foreach($categories as $category)<option value="{{ $category['slug'] }}">{{ $category['name'] }}</option>@endforeach</select><button class="rounded bg-navy px-4 py-2 font-semibold text-white">Apply</button></form><div class="mt-8 grid gap-5 md:grid-cols-2 lg:grid-cols-3">@foreach($vehicles as $vehicle)<x-fleet-card :vehicle="$vehicle" />@endforeach</div></x-section>
@endsection
