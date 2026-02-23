<footer class="py-1 border-t border-white/5 bg-[var(--bg-principal)]/60 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-4 flex items-center justify-center space-x-3">
        {{-- Escudo miniatura --}}
        <img src="{{ asset('foto/Escudo comunicaciones 50x50.webp') }}" alt="Escudo Policial" class="h-6 w-auto opacity-70"
            style="display: block !important;">

        {{-- Texto en una sola línea y más pequeño --}}
        <p
            class="text-[8px] md:text-[9px] text-[var(--texto-principal)] opacity-40 font-bold uppercase tracking-[0.1em] whitespace-nowrap">
            &copy; {{ date('Y') }} - Policía de Tierra del Fuego, Antártida e Islas del Atlántico Sur.
        </p>

        {{-- Punto decorativo de acento --}}
        <div class="h-1.5 w-1.5 rounded-full bg-[var(--color-acento)] opacity-40"></div>
    </div>
</footer>
