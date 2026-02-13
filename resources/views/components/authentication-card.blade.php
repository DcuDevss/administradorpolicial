<div class="min-h-screen flex flex-col items-center justify-center bg-transparent p-6 antialiased">

    <div class="relative mb-16 text-center">
        <span
            class="absolute -top-8 left-1/2 -translate-x-1/2 text-7xl font-black uppercase tracking-[0.4em] select-none hidden md:block"
            style="color: var(--color-acento); opacity: 0.1;">
            {{ $title_bg ?? 'POLICIA' }}
        </span>

        <h1 class="relative text-4xl md:text-6xl font-black tracking-tighter uppercase drop-shadow-2xl"
            style="color: var(--texto-principal);">
            {{ $title_main ?? 'ADMINISTRADOR' }}
            <span style="color: var(--color-acento); text-shadow: 0 0 15px var(--color-acento);">
                {{ $title_highlight ?? 'POLICIAL' }}
            </span>
        </h1>

        <div class="flex items-center justify-center gap-4 mt-4">
            <div class="h-[1px] w-16 bg-gradient-to-r from-transparent"
                style="background-image: linear-gradient(to right, transparent, var(--color-acento));"></div>
            <div class="h-1.5 w-1.5 rounded-full"
                style="background: var(--color-acento); box-shadow: 0 0 12px var(--color-acento);"></div>
            <div class="h-[1px] w-16 bg-gradient-to-l from-transparent"
                style="background-image: linear-gradient(to left, transparent, var(--color-acento));"></div>
        </div>
    </div>

    <div class="relative group flex flex-col md:flex-row items-center justify-center gap-12 w-full max-w-6xl">

        <div class="relative flex-shrink-0">
            <div class="absolute -inset-4 rounded-full animate-[spin_20s_linear_infinite] border-dashed"
                style="border: 1px dashed var(--color-acento); opacity: 0.3;">
            </div>
            <div class="relative p-4 backdrop-blur-sm rounded-full shadow-2xl"
                style="background: var(--bg-card); border: 1px solid var(--borde);">
                {{ $logo }}
            </div>
        </div>

        <div class="relative w-full sm:max-w-md">
            <div class="absolute -inset-[1px] rounded-3xl"
                style="background: linear-gradient(to bottom right, var(--color-acento), transparent); opacity: 0.4;">
            </div>

            <div class="relative px-8 py-10 rounded-3xl backdrop-blur-2xl"
                style="background: var(--bg-card); border: 1px solid var(--borde);">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
