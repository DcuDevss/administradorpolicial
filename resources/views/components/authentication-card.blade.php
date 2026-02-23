<div class="min-h-screen flex flex-col items-center justify-center bg-transparent px-6 py-10 antialiased">

    <!-- Header -->
    <div class="text-center mb-10">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold uppercase tracking-widest"
            style="color: var(--texto-principal);">
            {{ $title_main ?? 'ADMINISTRADOR' }}
        </h1>

        <div class="mt-2 text-sm sm:text-base uppercase tracking-[0.4em] font-semibold"
            style="color: var(--color-acento);">
            {{ $title_highlight ?? 'POLICIAL' }}
        </div>

        <div class="mt-4 h-[3px] w-24 mx-auto rounded-full" style="background: var(--color-acento);">
        </div>
    </div>

    <!-- Card Principal -->
    <div class="relative w-full max-w-md sm:max-w-lg md:max-w-4xl">

        <div class="relative grid md:grid-cols-2 gap-8 p-8 sm:p-10 rounded-3xl"
            style="background: var(--bg-card); border: 1px solid var(--borde);">

            <!-- Logo -->
            <div class="flex flex-col items-center justify-center text-center space-y-4">
                <div class="p-6 rounded-full"
                    style="border: 1px solid var(--borde); background: rgba(255,255,255,0.03);">
                    {{ $logo }}
                </div>
            </div>

            <!-- Formulario -->
            <div class="flex flex-col justify-center">
                <div class="mb-6 text-center text-sm uppercase tracking-wider font-semibold"
                    style="color: var(--color-acento);">
                    Ingreso Seguro
                </div>

                {{ $slot }}
            </div>

        </div>
    </div>

</div>
