@extends('layouts.app')
@section('title',$page->title.' | '.$site['name'])
@section('content')
<x-hero :title="$page->title" eyebrow="Draft legal content">This generated policy is a placeholder and must be reviewed by a qualified legal professional before publication.</x-hero>
<x-section :title="$page->title"><div class="rounded border border-slate-200 bg-white p-6 leading-8 text-steel"><p><strong>Draft notice:</strong> This page is generated for website structure only. Replace it with professionally reviewed legal text that reflects Trinetra Fleet Solutions' actual contracts, jurisdictions, cancellation rules, data processing, and operational policies.</p><p class="mt-4">{{ $page->body }}</p><p class="mt-4">The website does not process online payments, does not create public customer accounts, and does not include wallet or payment history features.</p></div></x-section>
@endsection
