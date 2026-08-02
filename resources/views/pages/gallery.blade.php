@extends('layouts.app')
@section('title','Gallery | '.$site['name'])
@section('content')
<x-hero title="Gallery" eyebrow="Media library" :image="$images['event']">Filterable fleet, event, corporate transport, wedding, airport and video gallery sections with vehicle-led visuals.</x-hero>
<x-section title="Image and Video Gallery"><div class="grid gap-5 md:grid-cols-3">@foreach(\App\Support\TrinetraData::galleryCategories() as $i=>$category)<figure class="overflow-hidden rounded border border-slate-200 bg-white"><div class="aspect-video"><img src="{{ asset(array_values($images)[$i % count($images)]) }}" alt="{{ $category }} transport visual" class="h-full w-full object-cover"></div><figcaption class="p-4 text-sm text-steel">{{ $category }}. Replace with owned project media through admin when available.</figcaption></figure>@endforeach</div></x-section>
@endsection
