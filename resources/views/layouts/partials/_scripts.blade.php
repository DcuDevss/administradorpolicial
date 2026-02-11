<script defer src="https://unpkg.com/@fullcalendar/core@6.1.20/index.global.min.js"></script>
<script defer src="https://unpkg.com/@fullcalendar/daygrid@6.1.20/index.global.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script>
    /* 1. LÓGICA DE MASCARILLAS (TEMAS) */
    function cambiarMascarilla(nombreTema) {
        const html = document.documentElement;

        // Aplicar tema
        html.setAttribute('data-theme', nombreTema);

        // Guardar preferencia
        localStorage.setItem('theme-police', nombreTema);

        // Sincronizar color de fondo del HTML para evitar destellos (Solo Temas Oscuros)
        const bgColors = {
            'modern-blue': '#0a0e17',
            'tactical-emerald': '#040d0a',
            'royal': '#1a1a2e',
            'dark': '#0f172a'
        };
        html.style.backgroundColor = bgColors[nombreTema] || bgColors['dark'];

        // Notificar a componentes que el tema cambió
        window.dispatchEvent(new Event('resize'));

        // Forzar a que los elementos con clases condicionales se enteren del cambio
        document.querySelectorAll('[class*="text-"]').forEach(el => {
            el.style.display = 'none';
            el.offsetHeight; // force reflow
            el.style.display = '';
        });
    }

    /* 2. SISTEMA DE CONFIRMACIÓN GLOBAL (SWEETALERT2) */
    document.addEventListener('click', function(event) {
        const btn = event.target.closest('button, a');
        if (!btn || btn.dataset.confirmed === "true") return;

        // Detectar si el botón implica una acción de escritura/cambio
        const text = (btn.innerText || '').toLowerCase().trim();
        const accionesCriticas = ['guardar', 'actualizar', 'crear', 'registrar', 'modificar', 'confirmar',
            'asignar', 'eliminar', 'borrar'
        ];

        if (!accionesCriticas.some(p => text.includes(p))) return;

        const form = btn.closest('form');
        const esAccionProcesable = btn.type === 'submit' || form || btn.hasAttribute('wire:click');

        if (!esAccionProcesable) return;

        event.preventDefault();

        // Configuración fija para Modo Oscuro (SweetAlert2)
        Swal.fire({
            title: '¿Confirmar operación?',
            text: '¿Deseas procesar los cambios realizados?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Sí, proceder',
            cancelButtonText: 'Cancelar',
            background: '#1e293b', // Color oscuro fijo
            color: '#ffffff', // Texto blanco fijo
            confirmButtonColor: '#3b82f6'
        }).then((result) => {
            if (result.isConfirmed) {
                btn.dataset.confirmed = "true";

                if (form && !form.hasAttribute('wire:submit')) {
                    form.submit();
                } else if (btn.getAttribute('wire:click')) {
                    btn.click();
                } else {
                    btn.click();
                }
            }
        });
    }, true);
</script>
