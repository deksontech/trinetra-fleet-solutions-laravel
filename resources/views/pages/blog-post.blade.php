@extends('layouts.app')
@section('title',$post->title.' | '.$site['name'])
@push('schema')<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'Article','headline'=>$post->title,'author'=>$post->author]) !!}</script>@endpush
@section('content')
<x-hero :title="$post->title" :eyebrow="optional($post->category)->name" :image="$images['interior']">{{ $post->excerpt }}</x-hero>
<x-section title="Article Draft"><article class="prose max-w-3xl whitespace-pre-line">{{ $post->body }}<div class="mt-8 rounded border border-slate-200 bg-white p-5">Share buttons placeholder: LinkedIn, X, WhatsApp.</div></article></x-section>
@endsection
