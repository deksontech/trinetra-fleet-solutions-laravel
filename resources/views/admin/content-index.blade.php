@extends('layouts.app')
@section('title',$definition['label'].' | Admin | '.$site['name'])
@section('content')
<section class="mx-auto max-w-7xl px-4 py-12">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-gold">Admin content</p>
            <h1 class="mt-2 text-4xl font-semibold text-navy">{{ $definition['label'] }}</h1>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="rounded border border-slate-200 bg-white px-4 py-2">Dashboard</a>
    </div>
    <form class="mt-8 flex max-w-lg gap-3">
        <input name="q" value="{{ request('q') }}" placeholder="Search records" class="w-full rounded border border-slate-300 px-3 py-2">
        <button class="rounded bg-navy px-5 py-2 font-semibold text-white">Search</button>
    </form>
    <div class="mt-6 overflow-x-auto rounded border border-slate-200 bg-white">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-slate-50 text-left text-xs uppercase tracking-[0.14em] text-steel">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    @foreach($definition['columns'] as $column)<th class="px-4 py-3">{{ \Illuminate\Support\Str::headline($column) }}</th>@endforeach
                    <th class="px-4 py-3">Updated</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($records as $record)
                    <tr>
                        <td class="px-4 py-3 font-semibold text-navy">{{ $record->id }}</td>
                        @foreach($definition['columns'] as $column)
                            <td class="max-w-sm truncate px-4 py-3 text-steel">{{ is_array($record->{$column}) ? json_encode($record->{$column}) : (string) $record->{$column} }}</td>
                        @endforeach
                        <td class="px-4 py-3 text-steel">{{ optional($record->updated_at)->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="{{ count($definition['columns']) + 2 }}" class="px-4 py-6 text-center text-steel">No records found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">{{ $records->links() }}</div>
    <p class="mt-6 text-sm text-steel">This module is backed by an Eloquent model and migration. Add, edit, delete and upload actions can be expanded from this screen when final operating roles are confirmed.</p>
</section>
@endsection
