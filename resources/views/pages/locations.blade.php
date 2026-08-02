@extends('layouts.app')
@section('title','Locations | '.$site['name'])
@section('content')
<x-hero title="Active Service Locations" eyebrow="Locations" :image="$images['road']">City pages are active only where status is enabled. Future cities are prepared for admin activation but not presented as operating locations.</x-hero>
<x-section title="Find a City"><div class="grid gap-5 md:grid-cols-3">@foreach($locations as $location)<a href="{{ route('locations.show',$location->slug) }}" class="rounded border border-slate-200 bg-white p-6"><p class="text-xs text-gold">{{ $location->region }}</p><h2 class="mt-2 text-xl font-semibold">{{ $location->name }}</h2><p class="mt-3 text-sm text-steel">{{ $location->summary }}</p></a>@endforeach</div></x-section>
@endsection
