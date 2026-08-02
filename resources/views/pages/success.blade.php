@extends('layouts.app')
@section('title','Enquiry Submitted | '.$site['name'])
@section('content')
<x-hero title="Enquiry Submitted" :eyebrow="$reference">Your enquiry reference has been generated. Acknowledgement email is sent when SMTP is configured.</x-hero>
<section class="mx-auto max-w-3xl px-4 py-16"><p class="text-lg text-steel">Reference number: <strong>{{ $reference }}</strong></p><div class="mt-6 flex gap-3"><a href="{{ route('home') }}" class="rounded bg-navy px-5 py-3 font-semibold text-white">Home</a><a href="https://wa.me/{{ $site['whatsapp'] }}?text={{ urlencode('Hello '.$site['name'].', my enquiry reference is '.$reference.'.') }}" class="rounded border px-5 py-3 font-semibold">Open WhatsApp</a></div></section>
@endsection
