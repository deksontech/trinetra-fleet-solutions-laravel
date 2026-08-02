@extends('layouts.app')
@section('title',$job->title.' | '.$site['name'])
@section('content')
<x-hero :title="$job->title" :eyebrow="$job->type" :image="$images['corporate']">{{ $job->location }}</x-hero>
<x-section title="Apply"><div class="grid gap-8 lg:grid-cols-[1fr_420px]"><div class="rounded border border-slate-200 bg-white p-6"><h2 class="text-xl font-semibold">Role Overview</h2><p class="mt-3 text-steel">{{ $job->body }}</p><ul class="mt-4 grid gap-2 text-steel"><li>• Professional conduct</li><li>• Documentation readiness</li><li>• Customer-service orientation</li></ul></div>@include('forms.career',['job'=>$job])</div></x-section>
@endsection
