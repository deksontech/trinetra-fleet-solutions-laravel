@extends('layouts.app')
@section('title','Clients and Gallery | '.$site['name'])
@section('content')
<x-hero title="Clients and Gallery" eyebrow="Corporate proof" :image="$images['event']">Client logos, testimonials and case studies are clearly marked for replacement. No reference-site logos or unverifiable claims are used.</x-hero>
<x-section title="Client Logo Grid"><div class="grid gap-4 md:grid-cols-4">@for($i=0;$i<8;$i++)<div class="grid h-28 place-items-center rounded border border-dashed border-slate-300 bg-white text-sm text-steel">[Add client logo]</div>@endfor</div></x-section>
<x-section title="Gallery Sections"><div class="grid gap-5 md:grid-cols-3">@foreach(\App\Support\TrinetraData::galleryCategories() as $category)<div class="rounded border border-slate-200 bg-white p-6"><h2 class="font-semibold">{{ $category }}</h2><p class="mt-3 text-sm text-steel">Admin-managed media with captions and lazy loading-ready layout.</p></div>@endforeach</div></x-section>
@endsection
