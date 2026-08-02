@extends('layouts.app')
@section('title','Legal Pages | '.$site['name'])
@section('content')
<x-hero title="Legal Pages" eyebrow="Draft content">Generated legal content requires professional legal review before publication.</x-hero>
<x-section title="Policies"><div class="grid gap-4 md:grid-cols-3">@foreach($legalPages as $page)<a class="rounded border border-slate-200 bg-white p-5 font-semibold" href="{{ route('legal.show',$page->slug) }}">{{ $page->title }}</a>@endforeach</div></x-section>
@endsection
