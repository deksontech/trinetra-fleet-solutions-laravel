@extends('layouts.app')
@section('title','Careers | '.$site['name'])
@section('content')
<x-hero title="Careers" eyebrow="Join the team" :image="$images['corporate']">Career content is ready for driver recruitment, operations, fleet coordination, sales and administrative roles.</x-hero>
<x-section title="Available Positions"><div class="grid gap-5 md:grid-cols-2 lg:grid-cols-4">@foreach($jobs as $job)<a href="{{ route('careers.show',$job->slug) }}" class="rounded border border-slate-200 bg-white p-6"><p class="text-xs text-gold">{{ $job->type }}</p><h2 class="mt-2 text-xl font-semibold">{{ $job->title }}</h2><p class="mt-3 text-sm text-steel">{{ $job->location }}</p></a>@endforeach</div></x-section>
<x-section title="Culture"><p class="max-w-3xl leading-8 text-steel">Add verified culture, hiring process and benefits information before publication. The application form includes consent and secure CV upload validation.</p></x-section>
@endsection
