# Instrucciones para Copilot en el Proyecto Administrador Policial

## Visión General del Proyecto
Este proyecto es una aplicación Laravel que gestiona información relacionada con la administración policial. La arquitectura se basa en componentes de Livewire para la interacción dinámica y en Blade para la presentación de vistas. Las principales funcionalidades incluyen la gestión de inventarios, investigaciones y dependencias.

## Estructura del Proyecto
- **app/**: Contiene la lógica de la aplicación, incluyendo controladores, modelos y componentes de Livewire.
- **resources/views/**: Contiene las vistas de Blade y componentes reutilizables.
- **routes/**: Define las rutas de la aplicación, tanto para la web como para la API.
- **database/**: Contiene migraciones, seeders y factories para la base de datos.

## Flujo de Trabajo del Desarrollador
1. **Construcción y Ejecución**: Utiliza `php artisan serve` para iniciar el servidor de desarrollo. Para ejecutar migraciones, usa `php artisan migrate`.
2. **Pruebas**: Ejecuta pruebas con `php artisan test`. Asegúrate de que las pruebas unitarias y de características estén bien cubiertas.
3. **Depuración**: Utiliza `dd()` y `dump()` para depurar datos en tiempo de ejecución. Laravel también proporciona herramientas de depuración en el entorno de desarrollo.

## Convenciones y Patrones del Proyecto
- **Nomenclatura**: Sigue las convenciones de Laravel para nombres de clases y métodos. Por ejemplo, los modelos deben estar en singular y en PascalCase.
- **Componentes de Livewire**: Los componentes de Livewire deben tener métodos claros y propiedades bien definidas. Utiliza `wire:model` para enlazar datos entre el componente y la vista.
- **Rutas**: Las rutas deben ser definidas en `routes/web.php` y `routes/api.php`, utilizando nombres de ruta para facilitar la referencia en las vistas.

## Puntos de Integración y Dependencias Externas
- **Livewire**: Se utiliza para crear interfaces de usuario dinámicas sin necesidad de recargar la página.
- **QR Code**: Se utiliza la biblioteca `SimpleSoftwareIO\QrCode` para generar códigos QR en la aplicación.
- **Base de Datos**: La aplicación utiliza Eloquent ORM para interactuar con la base de datos, facilitando la gestión de relaciones entre modelos.

## Ejemplos de Uso
- Para crear un nuevo registro de investigación, utiliza el componente `CreateInvestigacionesGeneral` en la vista correspondiente.
- Para editar un registro existente, utiliza el componente `EditInvestigacionesGeneral` y asegúrate de manejar correctamente las validaciones.

## Archivos Clave
- **app/Http/Livewire/Investigaciones/CreateInvestigacionesGeneral.php**: Lógica para crear investigaciones.
- **resources/views/livewire/investigaciones/create-investigaciones-general.blade.php**: Vista para crear investigaciones.
- **routes/web.php**: Definición de rutas de la aplicación.

---

Estas instrucciones están diseñadas para ayudar a los agentes de IA a comprender rápidamente la estructura y el flujo de trabajo del proyecto. Si hay secciones que no están claras o que necesitan más detalles, por favor házmelo saber para que pueda iterar sobre ellas.