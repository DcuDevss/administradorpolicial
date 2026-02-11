<footer class="py-6 border-t border-white/10 bg-[var(--bg-principal)]/80 backdrop-blur-md">
    <div class="max-w-7xl mx-auto px-4 flex flex-col items-center justify-center space-y-3">
        <img src="{{ asset('foto/escudo.png') }}" alt="Escudo Policial"
            class="h-14 w-auto opacity-90 hover:opacity-100 transition-all duration-500"
            style="display: block !important;">

        <div class="flex flex-col items-center">
            <p
                class="text-[10px] md:text-xs text-[var(--texto-principal)] opacity-50 font-bold uppercase tracking-[0.3em] text-center">
                &copy; {{ date('Y') }} - Sistema de Administración Policial
            </p>
            <div class="h-[1px] w-12 bg-[var(--color-acento)] mt-2 opacity-50"></div>
        </div>
    </div>
</footer>
