<script>
    function cambiarMascarilla(nombreTema) {
        const html = document.documentElement;

        // Aplicar tema
        html.setAttribute('data-theme', nombreTema);

        // Guardar preferencia
        localStorage.setItem('theme-police', nombreTema);

        // Cambiar overlay dinámico
        document.body.style.setProperty('--overlay-color', getOverlayColor(nombreTema));

        // Animar cards al cambiar de tema
        const cards = document.querySelectorAll('.card-profesional');
        cards.forEach(card => {
            card.classList.remove('card-animate'); // reinicia animación
            void card.offsetWidth; // fuerza reflow para que se aplique de nuevo
            card.classList.add('card-animate'); // aplica animación
        });


        // Notificar a componentes que el tema cambió
        window.dispatchEvent(new Event('resize'));
    }

    // Función que devuelve overlay según tema
    function getOverlayColor(nombreTema) {
        switch (nombreTema) {
            case 'original':
                return 'linear-gradient(rgba(0,29,61,0.9), rgba(0,51,102,0.85))';
            case 'clara':
                return 'linear-gradient(rgba(255,255,255,0.9), rgba(245,245,245,0.85))';
            case 'royal':
                return 'linear-gradient(rgba(20,8,15,0.9), rgba(40,10,25,0.85))';
            case 'tactical-emerald':
                return 'linear-gradient(rgba(4,13,10,0.9), rgba(10,26,21,0.85))';
            case 'modern-blue':
                return 'linear-gradient(rgba(10,14,23,0.9), rgba(22,32,51,0.85))';
            case 'cyber-command':
                return 'linear-gradient(rgba(0,10,20,0.9), rgba(0,20,40,0.85))';
            default:
                return 'rgba(0,0,0,0)';
        }
    }



    /* 2. SISTEMA DE CONFIRMACIÓN GLOBAL (SWEETALERT2) */
    document.addEventListener('click', function(event) {
        const btn = event.target.closest('button, a');

        // Si no hay botón, ya está confirmado, o es una acción de solo lectura, ignorar
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
        event.stopImmediatePropagation(); // evita que Livewire ejecute la acción antes de la confirmación

        // Evita reentradas rápidas
        if (btn.dataset.confirmedTemp) return;
        btn.dataset.confirmedTemp = "true";

        Swal.fire({
            title: '¿Confirmar operación?',
            text: '¿Deseas procesar los cambios realizados?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Sí, proceder',
            cancelButtonText: 'Cancelar',
            background: 'var(--bg-card)',
            color: 'var(--texto-principal)',
            confirmButtonColor: 'var(--color-acento)',
            customClass: {
                popup: 'border border-[var(--borde)] shadow-2xl'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                btn.dataset.confirmed = "true";

                // Ejecutar acción según tipo
                if (form && !form.hasAttribute('wire:submit')) {
                    form.submit();
                }
                // Para Livewire solo eliminamos el flag temporal; Livewire captura normalmente
            }
            // Limpiar flag temporal
            setTimeout(() => delete btn.dataset.confirmedTemp, 500);
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

    document.addEventListener('DOMContentLoaded', () => {
        const temaGuardado = localStorage.getItem('theme-police') || 'original';
        cambiarMascarilla(temaGuardado);
    });
</script>
