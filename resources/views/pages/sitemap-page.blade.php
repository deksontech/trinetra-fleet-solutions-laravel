@extends('layouts.app')
@section('title','HTML Sitemap | '.$site['name'])
@section('content')
<x-hero title="HTML Sitemap" eyebrow="Sitemap"></x-hero>
<x-section title="All Pages"><div class="grid gap-2 md:grid-cols-3">@foreach($links as $href)<a class="rounded bg-white px-4 py-2 text-sm" href="{{ $href }}">{{ $href }}</a>@endforeach</div></x-section>
@endsection
