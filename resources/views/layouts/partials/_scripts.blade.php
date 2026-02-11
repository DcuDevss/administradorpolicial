<script>
    /* 1. LÓGICA DE MASCARILLAS (TEMAS) */
    function cambiarMascarilla(nombreTema) {
        const html = document.documentElement;

        // Aplicar tema
        html.setAttribute('data-theme', nombreTema);

        // Guardar preferencia
        localStorage.setItem('theme-police', nombreTema);

        // Sincronizar color de fondo del HTML para evitar destellos
        const bgColors = {
            'modern-blue': '#0a0e17',
            'tactical-emerald': '#040d0a',
            'royal': '#1a1a2e',
            'dark': '#0f172a'
        };
        html.style.backgroundColor = bgColors[nombreTema] || bgColors['dark'];

        // Notificar a componentes que el tema cambió
        window.dispatchEvent(new Event('resize'));

        // Reflow optimizado para actualizar variables CSS
        document.querySelectorAll('[class*="text-"]').forEach(el => {
            el.offsetHeight;
        });
    }

    /* 2. SISTEMA DE CONFIRMACIÓN GLOBAL (SWEETALERT2) */
    document.addEventListener('click', function(event) {
        const btn = event.target.closest('button, a');

        // Si no hay botón, ya está confirmado, o es una acción de Livewire de "solo lectura", ignorar.
        if (!btn || btn.dataset.confirmed === "true") return;

        // Detectar acciones críticas
        const text = (btn.innerText || '').toLowerCase().trim();
        const accionesCriticas = ['guardar', 'actualizar', 'crear', 'registrar', 'modificar', 'confirmar',
            'asignar', 'eliminar', 'borrar'
        ];

        if (!accionesCriticas.some(p => text.includes(p))) return;

        // Verificar si es un botón de envío o tiene acción de Livewire
        const form = btn.closest('form');
        const esAccionProcesable = btn.type === 'submit' || form || btn.hasAttribute('wire:click');

        if (!esAccionProcesable) return;

        event.preventDefault();
        event.stopImmediatePropagation(); // Evita que Livewire ejecute la acción antes de la confirmación

        // Configuración SweetAlert2 adaptada a tus mascarillas
        Swal.fire({
            title: '¿Confirmar operación?',
            text: '¿Deseas procesar los cambios realizados?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Sí, proceder',
            cancelButtonText: 'Cancelar',
            background: 'var(--bg-card)', // Usa el color de tu mascarilla
            color: 'var(--texto-principal)', // Usa el texto de tu mascarilla
            confirmButtonColor: 'var(--color-acento)', // Usa el color de acento
            customClass: {
                popup: 'border border-[var(--borde)] shadow-2xl'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                btn.dataset.confirmed = "true";

                // Ejecución según el tipo de acción
                if (form && !form.hasAttribute('wire:submit')) {
                    form.submit();
                } else {
                    // Simular click para que Livewire/Alpine procesen la acción original
                    btn.click();
                }
            }
        });
    }, true);

    /* 3. BLOQUEO ESPECÍFICO DE NOTIFICACIONES "SAVED" */
    // Este observador asegura que si Livewire intenta inyectar el texto, se elimine de inmediato.
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            mutation.addedNodes.forEach((node) => {
                if (node.nodeType === 1 && (node.innerText === 'Saved.' || node.hasAttribute(
                        'x-show'))) {
                    if (node.innerText.trim() === 'Saved.') {
                        node.style.display = 'none';
                    }
                }
            });
        });
    });

    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
</script>
