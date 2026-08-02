@extends('layouts.app')
@section('title','Tours | '.$site['name'])
@section('content')
<x-hero title="Tours and Customized Travel Packages" eyebrow="Tours" :image="$images['road']">No fixed prices are displayed. Every tour uses Request a Customized Quote.</x-hero>
<x-section title="Tour Packages"><div class="grid gap-5 md:grid-cols-3">@foreach($tours as $tour)<a href="{{ route('tours.show',$tour->slug) }}" class="rounded border border-slate-200 bg-white p-6"><h2 class="text-xl font-semibold">{{ $tour->title }}</h2><p class="mt-3 text-steel">{{ $tour->summary }}</p><p class="mt-5 text-sm font-semibold text-gold">Request a Customized Quote</p></a>@endforeach</div></x-section>
@endsection
