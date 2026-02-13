<div class="min-h-screen flex flex-col items-center justify-center bg-transparent p-6 antialiased">

    <div class="relative mb-16 text-center">
        <span
            class="absolute -top-8 left-1/2 -translate-x-1/2 text-blue-500/10 text-7xl font-black uppercase tracking-[0.4em] select-none hidden md:block">
            {{ $title_bg ?? 'POLICIA' }}
        </span>

        <h1 class="relative text-4xl md:text-6xl font-black text-white tracking-tighter uppercase drop-shadow-2xl">
            {{ $title_main ?? 'ADMINISTRADOR' }} <span
                class="text-blue-500 drop-shadow-[0_0_15px_rgba(59,130,246,0.5)]">{{ $title_highlight ?? 'POLICIAL' }}</span>
        </h1>

        <div class="flex items-center justify-center gap-4 mt-4">
            <div class="h-[1px] w-16 bg-gradient-to-r from-transparent to-blue-500/50"></div>
            <div class="h-1.5 w-1.5 rounded-full bg-blue-500 shadow-[0_0_12px_#3b82f6]"></div>
            <div class="h-[1px] w-16 bg-gradient-to-l from-transparent to-blue-500/50"></div>
        </div>
    </div>

    <div class="relative group flex flex-col md:flex-row items-center justify-center gap-12 w-full max-w-6xl">
        <div
            class="absolute -inset-10 bg-blue-600/10 rounded-full blur-3xl opacity-30 group-hover:opacity-50 transition duration-1000">
        </div>

        <div class="relative flex-shrink-0">
            <div
                class="absolute -inset-4 border border-blue-500/20 rounded-full animate-[spin_20s_linear_infinite] border-dashed">
            </div>
            <div class="relative p-4 bg-slate-900/40 backdrop-blur-sm rounded-full border border-white/5 shadow-2xl">
                {{ $logo }}
            </div>
        </div>

        <div class="relative w-full sm:max-w-md">
            <div
                class="absolute -inset-[1px] bg-gradient-to-br from-blue-500/50 via-transparent to-slate-700/50 rounded-3xl">
            </div>
            <div class="relative px-8 py-10 bg-slate-900/95 rounded-3xl backdrop-blur-2xl border border-white/10">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
