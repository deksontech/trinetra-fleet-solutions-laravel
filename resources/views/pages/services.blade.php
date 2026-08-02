@extends('layouts.app')
@section('title','Services | '.$site['name'])
@section('content')
<x-hero title="Transportation and Fleet Management Services" eyebrow="Services" :image="$images['corporate']">Original service pages for corporate mobility, employee transportation, chauffeur-driven cars, airport transfers, events, leasing, tours and optional self-drive enquiries.</x-hero>
<x-section title="All Services"><div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">@foreach($services as $service)<x-service-card :service="$service" />@endforeach</div></x-section>
@endsection
