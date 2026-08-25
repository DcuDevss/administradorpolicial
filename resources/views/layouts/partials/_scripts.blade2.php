<script>
    /**
     * ============================================================
     * TEMAS
     * ============================================================
     */

    function cambiarMascarilla(nombreTema) {
        const html = document.documentElement;

        html.setAttribute('data-theme', nombreTema);

        localStorage.setItem('theme-police', nombreTema);

        document.body.style.setProperty(
            '--overlay-color',
            getOverlayColor(nombreTema)
        );

        window.dispatchEvent(new Event('resize'));
    }


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
     * ============================================================
     * TOAST
     * ============================================================
     *
     * SweetAlert2 se carga desde resources/js/app.js.
     * No lo inicializamos al evaluar este script porque Vite
     * puede todavía no haber terminado de cargar el módulo.
     */

    function mostrarToast(type, message) {

        if (!window.Swal) {
            console.error(
                'SweetAlert2 no está disponible todavía.'
            );

            return;
        }

        window.Swal.fire({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: type,
            title: message,

            background: 'var(--bg-card)',
            color: 'var(--texto-principal)',

            didOpen: (toast) => {

                toast.addEventListener(
                    'mouseenter',
                    window.Swal.stopTimer
                );

                toast.addEventListener(
                    'mouseleave',
                    window.Swal.resumeTimer
                );
            }
        });
    }


    /**
     * ============================================================
     * NOTIFICACIONES LIVEWIRE
     * ============================================================
     */

    document.addEventListener('livewire:init', () => {

        window.addEventListener('notificacion', (event) => {

            mostrarToast(
                event.detail?.type ?? 'success',
                event.detail?.message ?? ''
            );

        });

    });


    /**
     * ============================================================
     * CONFIRMACIÓN GLOBAL
     * ============================================================
     */

    document.addEventListener('click', function(event) {

        if (event.defaultPrevented) {
            return;
        }

        const btn = event.target.closest('button, a');

        if (!btn) {
            return;
        }

        if (btn.dataset.confirmed === 'true') {
            return;
        }

        if (btn.closest('.form-logout')) {
            return;
        }

        const text = (
            btn.innerText || ''
        )
            .toLowerCase()
            .replace(/[!?.¿¡]/g, '')
            .trim();


        /**
         * Acciones que NO necesitan confirmación.
         */
        const ignorar = [
            'buscar',
            'cerrar',
            'volver',
            'cancelar'
        ];

        if (
            ignorar.some(
                palabra => text.includes(palabra)
            )
        ) {
            return;
        }


        /**
         * Acciones que SÍ requieren confirmación.
         */
        const acciones = [
            'guardar',
            'actualizar',
            'crear',
            'registrar',
            'modificar',
            'confirmar',
            'asignar',
            'eliminar',
            'borrar'
        ];

        if (
            !acciones.some(
                palabra => text.includes(palabra)
            )
        ) {
            return;
        }


        const form = btn.closest('form');

        const wireClick = btn.getAttribute(
            'wire:click'
        );


        if (
            !form &&
            !wireClick &&
            btn.type !== 'submit'
        ) {
            return;
        }


        /**
         * Importante:
         *
         * No interceptamos todavía las acciones Livewire.
         * Las dejamos pasar normalmente para evitar interferir
         * con la hidratación/morphing de Livewire.
         */

        if (wireClick) {
            return;
        }


        if (!window.Swal) {
            return;
        }


        event.preventDefault();
        event.stopImmediatePropagation();


        window.Swal.fire({

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

            if (
                result.isConfirmed &&
                form
            ) {

                form.submit();

            }

        });

    });


    /**
     * ============================================================
     * LOGOUT
     * ============================================================
     */

    document.addEventListener('click', function(event) {

        const form = event.target.closest(
            '.form-logout'
        );

        if (!form) {
            return;
        }


        event.preventDefault();

        event.stopPropagation();


        if (!window.Swal) {
            form.submit();
            return;
        }


        window.Swal.fire({

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


    /**
     * ============================================================
     * OCULTAR "Saved."
     * ============================================================
     */

    const observer = new MutationObserver((mutations) => {

        mutations.forEach((mutation) => {

            mutation.addedNodes.forEach((node) => {

                if (node.nodeType !== 1) {
                    return;
                }

                const text = node.innerText?.trim();

                if (text === 'Saved.') {
                    node.style.display = 'none';
                }

            });

        });

    });


    observer.observe(
        document.body,
        {
            childList: true,
            subtree: true
        }
    );


    /**
     * ============================================================
     * INICIALIZACIÓN DEL TEMA
     * ============================================================
     */

    document.addEventListener(
        'DOMContentLoaded',
        () => {

            const temaGuardado =
                localStorage.getItem('theme-police') ||
                'dark';

            cambiarMascarilla(
                temaGuardado
            );


            @if (session()->has('success') || session()->has('flash.banner'))

                mostrarToast(
                    'success',
                    @json(
                        session('success') ??
                        session('flash.banner')
                    )
                );

            @endif


            @if (session()->has('error'))

                mostrarToast(
                    'error',
                    @json(session('error'))
                );

            @endif

        }
    );

</script>