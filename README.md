# Administrador Policial

## Descripción general

Administrador Policial es un sistema interno de gestión para una fuerza policial.  
Permite administrar:

- Inventario de equipos informáticos y de comunicaciones.
- Dependencias y comisarías en distintas localidades.
- Turnos y calendario de trabajo.
- Notificaciones internas, chat y auditorías de cambios.

Está pensado para uso interno, con distintos paneles según el rol del usuario
(administradores, técnicos, usuarios de comisarías, recursos humanos, etc.).

## Tecnologías principales

- PHP 8.1+
- Laravel 10
- Livewire 3 (componentes interactivos)
- Blade (vistas)
- MySQL (base de datos)
- Laravel Fortify / Jetstream / Sanctum (autenticación)
- Spatie Laravel Permission (roles y permisos)
- DomPDF (PDFs), QrCode, Pusher, Guzzle (otras integraciones)

## Estructura básica

- `app/Models` — Modelos Eloquent (tablas de base de datos).
- `app/Http/Livewire` — Componentes Livewire organizados por módulos.
- `app/Http/Controllers` — Controladores HTTP tradicionales (si se usan).
- `resources/views` — Vistas Blade (layouts, dashboards, formularios, etc.).
- `routes/web.php` — Rutas web y asignación de middlewares por rol.
- `database/migrations` — Migraciones de tablas.
- `database/seeders` — Seeders como `RolesSeeder`, `UserSeeder`, etc.

## Módulos principales (índice funcional)

- **Autenticación y usuarios**
  - Inicio de sesión, registro y verificación.
  - Gestión de usuarios y perfiles.
  - Asignación de roles y permisos (Admin, técnicos, usuarios de comisarías, RRHH, etc.).

- **Inventario informático**
  - Alta, baja y modificación de equipos por dependencia.
  - Historial de cambios y auditorías.

- **Comunicaciones**
  - Gestión de equipamiento y trabajos de comunicaciones por comisaría/dependencia.
  - Historial de intervenciones (instalaciones, reparaciones, movimientos).

- **Turnos**
  - Calendario de turnos.
  - Asignación y visualización de turnos por usuario/dependencia.

- **Notificaciones y chat**
  - Notificaciones internas entre dependencias y técnicos.
  - Mensajería/chat entre usuarios.

- **Auditorías**
  - Registro de cambios relevantes (por ejemplo en inventarios).

## Puesta en marcha rápida

1. Clonar el repositorio.
2. Copiar `.env.example` a `.env` y configurar base de datos, `APP_URL`, etc.
3. Instalar dependencias:
   ```bash
   composer install
   npm install && npm run build   # opcional según el flujo de frontend
   ```
4. Generar key de la aplicación:
   ```bash
   php artisan key:generate
   ```
5. Ejecutar migraciones y seeders:
   ```bash
   php artisan migrate --seed
   ```
6. Levantar el servidor de desarrollo:
   ```bash
   php artisan serve
   ```

## Más información

Este proyecto está construido sobre Laravel, por lo que toda la documentación
oficial del framework sigue siendo válida para extender o modificar la aplicación.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
