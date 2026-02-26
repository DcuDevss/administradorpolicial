<script>
    /**
     * 1. GESTIÓN DE MASCARILLAS (TEMAS)
     * Aplica el tema visual y el degradado de fondo correspondiente.
     */
    function cambiarMascarilla(nombreTema) {
        const html = document.documentElement;

        // Aplicar atributo de tema
        html.setAttribute('data-theme', nombreTema);

        // Guardar en almacenamiento local
        localStorage.setItem('theme-police', nombreTema);

        // Actualizar la variable CSS del overlay
        document.body.style.setProperty('--overlay-color', getOverlayColor(nombreTema));

        // Notificar a otros componentes (útil para gráficos o layouts)
        window.dispatchEvent(new Event('resize'));
    }

    /**
     * Define los degradados de fondo según el tema seleccionado.
     */
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
            case 'modern-intitucional':
                return 'linear-gradient(rgba(10,14,23,0.9), rgba(22,32,51,0.85))';
            case 'cyber-command':
                return 'linear-gradient(rgba(0,10,20,0.9), rgba(0,20,40,0.85))';
            case 'dark':
                return 'linear-gradient(rgba(0,0,0,0.9), rgba(30,41,59,0.85))';
            default:
                return 'rgba(0,0,0,0)';
        }
    }

    /**
     * 2. SISTEMA DE CONFIRMACIÓN GLOBAL
     * Intercepta clics en botones de acción para pedir confirmación con SweetAlert2.
     */
    document.addEventListener('click', function(event) {
        if (event.defaultPrevented) return;

        const btn = event.target.closest('button, a');
        if (!btn || btn.dataset.confirmed === "true") return;

        if (btn.closest('.form-logout')) return;

        const text = (btn.innerText || '').toLowerCase().replace(/[!?.¿¡]/g, '').trim();


        // Ignorar botones de navegación o cierre
        if (['buscar', 'cerrar', 'volver', 'cancelar',].some(p => text.includes(p))) return;

        // Solo actuar en botones de "escritura" o "borrado"
        const acciones = ['guardar', 'actualizar', 'crear', 'registrar', 'modificar', 'confirmar', 'asignar',
            'eliminar', 'borrar'
        ];
        if (!acciones.some(p => text.includes(p))) return;

        const form = btn.closest('form');
        const wireClick = btn.dataset.wire;
        if (!form && !wireClick && btn.type !== 'submit') return;

        event.preventDefault();
        event.stopImmediatePropagation();

        Swal.fire({
            title: '¿Confirmar operación?',
            text: '¿Deseas procesar los cambios realizados?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Sí, proceder',
            cancelButtonText: 'Cancelar',
            background: 'var(--bg-card)',
            color: 'var(--texto-principal)',
            confirmButtonColor: 'var(--color-acento)'
        }).then((result) => {
            if (result.isConfirmed) {
                if (wireClick && window.Livewire) {
                    const componentId = btn.closest('[wire\\:id]')?.getAttribute('wire:id');
                    const id = btn.dataset.id;
                    if (componentId) {
                        Livewire.find(componentId).call(wireClick, id);
                    }
                } else if (form) {
                    form.submit();
                }
            }
        });
    });

    /**
     * 3. SISTEMA DE NOTIFICACIONES TOAST UNIVERSAL
     * Configuración de alertas que no bloquean la pantalla y usan los colores del tema.
     */
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        background: 'var(--bg-card)',
        color: 'var(--texto-principal)',
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    // Escuchar notificaciones desde Livewire (v3)
    window.addEventListener('notificacion', event => {
        Toast.fire({
            icon: event.detail.type || 'success',
            title: event.detail.message
        });
    });
    /**
     * 4. OBSERVADOR PARA OCULTAR "SAVED."
     * Evita que el mensaje por defecto de Jetstream ensucie la UI.
     */
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            mutation.addedNodes.forEach((node) => {
                if (node.nodeType === 1) {
                    const text = node.innerText?.trim();
                    if (text === 'Saved.' || node.hasAttribute('x-show')) {
                        if (text === 'Saved.') node.style.display = 'none';
                    }
                }
            });
        });
    });
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });

    /**
     * 5. INICIALIZACIÓN AL CARGAR EL DOCUMENTO
     */
    document.addEventListener('DOMContentLoaded', () => {
        // Cargar tema preferido
        const temaGuardado = localStorage.getItem('theme-police') || 'dark';
        cambiarMascarilla(temaGuardado);

        // Capturar mensajes de éxito/error de sesiones tradicionales de Laravel
        @if (session()->has('success') || session()->has('flash.banner'))
            Toast.fire({
                icon: 'success',
                title: "{{ session('success') ?? session('flash.banner') }}"
            });
        @endif

        @if (session()->has('error'))
            Toast.fire({
                icon: 'error',
                title: "{{ session('error') }}"
            });
        @endif
    });

    document.addEventListener('click', function(e) {
    const form = e.target.closest('.form-logout');
    if (!form) return;

    e.preventDefault();
    e.stopPropagation();

    Swal.fire({
        title: '¿Seguro que desea cerrar sesión?',
        text: 'Tu sesión actual se cerrará.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, salir',
        cancelButtonText: 'Cancelar',
        background: 'var(--bg-card)',
        color: 'var(--texto-principal)',
        confirmButtonColor: 'var(--color-acento)'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });

});
</script>
