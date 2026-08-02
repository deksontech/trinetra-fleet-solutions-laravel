@extends('layouts.app')
@section('title','Blog | '.$site['name'])
@section('content')
<x-hero title="Blog" eyebrow="Resources" :image="$images['interior']">Sample placeholder articles are included for SEO structure without fabricated achievements or client stories.</x-hero>
<x-section title="Articles"><div class="mb-6 flex flex-wrap gap-2">@foreach($categories as $category)<span class="rounded border border-slate-200 bg-white px-4 py-2 text-sm">{{ $category }}</span>@endforeach</div><div class="grid gap-5 md:grid-cols-3">@foreach($posts as $post)<a href="{{ route('blog.show',$post->slug) }}" class="rounded border border-slate-200 bg-white p-6"><p class="text-xs text-gold">{{ optional($post->category)->name }}</p><h2 class="mt-2 text-xl font-semibold">{{ $post->title }}</h2><p class="mt-3 text-sm text-steel">{{ $post->excerpt }}</p></a>@endforeach</div></x-section>
@endsection
