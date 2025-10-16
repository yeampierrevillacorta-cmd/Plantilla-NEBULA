# NEBULA - Portal Tech (Laravel)

Proyecto Laravel con temática espacial en blanco y negro, fondo de agujero negro y efectos interactivos: intro cinematográfica, campo de estrellas animado y estelas en cursor, texto y tarjetas. Tailwind se carga por CDN, sin build local.

## Requisitos
- PHP 8.2+
- Composer 2+
- Node.js (opcional; no requerido para estilos en este proyecto)

## Instalación
```bash
# 1) Dependencias PHP
composer install

# 2) Variables de entorno y clave
cp .env.example .env
php artisan key:generate

# 3) (Opcional) Enlazar storage si lo necesitas
php artisan storage:link
```

## Ejecución en local
```bash
# Servidor de desarrollo Laravel (puedes cambiar el puerto)
php artisan serve --port=8001
```
Abre: `http://127.0.0.1:8001`

### Rutas principales
- `/` → Intro cinematográfica (black & white, fondo de agujero negro, estrellas y cometas).
- `/tech` → Página principal (hero + servicios + estadísticas) con starfield y estelas.
- `/intro` → Acceso directo a la intro.

### Flujo Intro → Tech (sin bucles)
- La intro marca `sessionStorage.cameFromIntro = true` y redirige a `/tech` al finalizar o al pulsar Enter/Espacio.
- En `/tech` se permite el acceso si vienes de la intro, si ya fue autorizado (`allowDirectTech`) o si es la segunda visita (`hasVisitedTech`).
- La primera visita directa a `/tech` redirige a la intro una sola vez por sesión.

## Estructura relevante
- `resources/views/intro.blade.php` → Intro (fondo agujero negro, estrellas parallax, cometas con estela, explosión y ondas, estela de cursor).
- `resources/views/tech.blade.php` → Tech (tema black & white, starfield animado, estelas en cursor, texto y tarjetas, Tailwind por CDN).
- `routes/web.php` → Define rutas `/`, `/intro`, `/tech`.
- `server.php` (raíz) → Requerido por `php artisan serve` para enrutar a `public/index.php`.

## Estilos y efectos
- Tailwind CSS por CDN (sin Vite/Webpack).
- Gradientes y sombras en escala de grises.
- Starfield animado con JavaScript (`requestAnimationFrame`).
- Estelas:
  - Cursor (intro y tech): puntos que siguen el movimiento con decaimiento.
  - Estrellas: cola luminosa en movimiento.
  - Títulos: estela con `text-shadow` animado.
  - Cards: barrido diagonal luminoso al hover.

## Troubleshooting
### 1) La web sigue “activa” tras parar `serve`
Puede haber otro servidor escuchando. En PowerShell:
```powershell
netstat -ano | findstr LISTENING | findstr :8001
taskkill /PID <PID> /F
```
Repite para `:8000`, `:8002`, `:8080`, `:5173`. También prueba recarga dura (Ctrl+F5) para limpiar caché del navegador.

### 2) Bucle entre `/intro` y `/tech`
En la consola del navegador:
```js
sessionStorage.clear()
```
Recarga. Entra primero a `/` y deja pasar la intro hasta `/tech`.

## Despliegue
- Configura Nginx/Apache para apuntar `public/` como document root.
- Permisos de escritura para `storage/` y `bootstrap/cache/`.
- Optimiza cachés:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Personalización
- Textos, secciones y efectos en `resources/views/tech.blade.php`.
- Duración/densidad de estrellas/cometas en `resources/views/intro.blade.php`.
- Fondo del agujero negro: cambia la URL en el `background` de ambos archivos.

## Créditos
- Laravel
- Tailwind CSS (CDN)
- Imagen del agujero negro: URL provista por el usuario

---
Sugerencias y mejoras (contacto, portfolio dinámico, blog) pueden añadirse extendiendo vistas Blade y rutas.

## Despliegue en Vercel
Este proyecto puede ejecutarse en Vercel con funciones serverless de PHP (sin Vite).

### Archivos añadidos
- `vercel.json` (configuración de funciones y rutas)
- `api/index.php` (front controller que incluye `public/index.php`)

### vercel.json
```json
{
  "functions": {
    "api/index.php": { "runtime": "vercel-php@0.6.0" }
  },
  "routes": [
    { "src": "/(.*)", "dest": "/api/index.php" }
  ]
}
```

### api/index.php
```php
<?php
// Vercel front controller for Laravel
require __DIR__ . '/../public/index.php';
```

### Variables de entorno en Vercel
- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_KEY` (copiar desde tu `.env` local tras `php artisan key:generate`)

### Despliegue
```bash
npm i -g vercel
vercel login
vercel        # primer despliegue (preview)
vercel --prod # producción
```

Notas:
- `server.php` no se usa en Vercel; el enrutamiento lo hace `api/index.php`.
- Si usas sesiones/archivos, considera un backend de sesión persistente/externo.
- Tailwind por CDN elimina la necesidad de build front-end.

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

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
