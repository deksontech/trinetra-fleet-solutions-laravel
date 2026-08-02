@extends('layouts.app')
@section('title','Contact | '.$site['name'])
@section('content')
<x-hero title="Contact Trinetra Fleet Solutions" eyebrow="Contact us" :image="$images['airport']">Reach Trinetra Fleet Solutions for corporate mobility, airport transfers, fleet requirements and quotation support.</x-hero>
<x-section title="Contact Details"><div class="grid gap-8 lg:grid-cols-[0.8fr_1fr]"><div class="rounded border border-slate-200 bg-white p-6"><p><strong>Phone:</strong> {{ $site['phone'] }}</p><p class="mt-3"><strong>Email:</strong> {{ $site['email'] }}</p><p class="mt-3"><strong>Address:</strong> {{ $site['address'] }}</p><p class="mt-3"><strong>Office hours:</strong> [Add office hours]</p><div class="mt-6 flex gap-3"><a href="tel:{{ $site['phone'] }}" class="rounded bg-navy px-4 py-3 text-white">Call</a><a href="https://wa.me/{{ $site['whatsapp'] }}" class="rounded border px-4 py-3">WhatsApp</a></div><div class="mt-6 aspect-video rounded border border-dashed border-slate-300 p-5 text-steel">Google Maps embed placeholder</div></div>@include('forms.contact')</div></x-section>
@endsection
