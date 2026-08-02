<div x-data="{show: !localStorage.getItem('trinetra_cookie_consent')}" x-show="show" class="fixed bottom-4 left-4 right-4 z-50 rounded border border-slate-200 bg-white p-4 shadow-soft md:left-auto md:max-w-xl">
    <p class="text-sm text-ink">We use essential cookies for site operation. Analytics placeholders load only after consent and when tracking IDs are configured.</p>
    <div class="mt-3 flex flex-wrap gap-2">
        <button class="rounded border border-slate-200 px-3 py-2 text-sm font-semibold" @click="localStorage.setItem('trinetra_cookie_consent','Accept'); show=false">Accept</button>
        <button class="rounded border border-slate-200 px-3 py-2 text-sm font-semibold" @click="localStorage.setItem('trinetra_cookie_consent','Reject'); show=false">Reject non-essential</button>
        <a class="rounded bg-navy px-3 py-2 text-sm font-semibold text-white" href="{{ route('legal.show','cookie-policy') }}">Cookie Policy</a>
    </div>
</div>
