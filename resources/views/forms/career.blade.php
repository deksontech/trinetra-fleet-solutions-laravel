<form method="POST" action="{{ route('forms.career') }}" enctype="multipart/form-data" class="grid gap-4 rounded border border-slate-200 bg-white p-6 shadow-soft">
    @csrf
    <input type="hidden" name="job_slug" value="{{ $job->slug }}">
    <label class="text-sm">Full name<input name="full_name" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required></label>
    <label class="text-sm">Email<input name="email" type="email" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required></label>
    <label class="text-sm">Phone<input name="phone" class="mt-1 w-full rounded border border-slate-300 px-3 py-2" required></label>
    <label class="text-sm">Experience<input name="experience" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"></label>
    <label class="text-sm">Message<textarea name="message" class="mt-1 min-h-28 w-full rounded border border-slate-300 px-3 py-2"></textarea></label>
    <label class="text-sm">CV upload<input name="cv" type="file" accept=".pdf,.doc,.docx" class="mt-1 w-full rounded border border-slate-300 px-3 py-2"><span class="mt-1 block text-xs text-steel">PDF, DOC or DOCX, maximum 4 MB.</span></label>
    <label class="flex gap-2 text-sm text-steel"><input name="consent" value="1" type="checkbox" required> I consent to be contacted.</label>
    <button class="rounded bg-gold px-5 py-3 font-semibold text-white">Submit Application</button>
</form>
