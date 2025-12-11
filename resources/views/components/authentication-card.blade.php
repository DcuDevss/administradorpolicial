<div class="min-h-screen flex flex-col sm:justify-center items-center
            bg-transparent">

    <div class="mb-4">
        {{ $logo }}
    </div>

    <div
        class="w-full sm:max-w-lg mt-6 px-8 py-6 bg-slate-900 bg-opacity-70
                shadow-xl backdrop-blur rounded-2xl border border-slate-700">
        {{ $slot }}
    </div>
</div>
