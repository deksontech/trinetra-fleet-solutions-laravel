@extends('layouts.app')
@section('title','Request a Quote | '.$site['name'])
@section('content')
<x-hero title="Request a Quote" eyebrow="Enquiry only" :image="$images['airport']">Submit route, date, passenger and vehicle details. No online payment, wallet, customer login or account creation is included.</x-hero>
<x-section title="Quotation Form">@include('forms.quote')</x-section>
@endsection
