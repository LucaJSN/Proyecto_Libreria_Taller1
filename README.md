<p align="center"><a href="http://proyecto_libreria_taller1.test" target="_blank"><img src="punto-y-barra.svg" width="400" alt="Punto y Barra Logo"></a></p>

<p align="center">
<a href="https://img.shields.io/badge/version-1.0.0-blue"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://img.shields.io/badge/PHP-8.2-purple"><img src="https://img.shields.io/badge/PHP-8.2-purple" alt="Total Downloads"></a>
<a href="https://img.shields.io/badge/Laravel-11.x-red"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://img.shields.io/badge/license-MIT-green"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Acerca del Proyecto

Punto y Barra es una aplicación web de e-comerce que gestiona una librería ficticia, desarrollado con laravel 
Permite a los usuarios:

- Gestión de usuarios y roles
- Creación y edición de productos de librería
- Reportes y estadísticas en tiempo real

## Autor

Desarrollado por SAUCEDO Nielsen Luca y OVALLE Bravo Bautista


## Características Principales

- **Autenticación**: Login seguro con Laravel Sanctum
- **Panel Admin**: Dashboard interactivo con estadísticas
- **API REST**: Endpoints para integración con frontend

## Tecnologías utilizadas

- Php
- Html y Css
- Laravel
- Bootstrap

## Instalación

### Requisitos Previos
- PHP >= 8.2
- Composer
- MySQL / PostgreSQL / SQLite

## Pasos de Instalación:

### Clonar el repositorio
git clone https://github.com/LucaJSN/Proyecto_Libreria_Taller1

## Entrar al directorio
cd C:Documentos/Laravel/proyecto-libreria-taller1

## Instalar dependencias PHP
composer install

## Copiar archivo de entorno
cp .env.example .env

## Generar clave de aplicación
php artisan key:generate

## Configucion de base de datos
- DB_CONNECTION=mariadb
- DB_HOST=127.0.0.1
- DB_PORT=33060
- DB_DATABASE=puntobarra
- DB_USERNAME=root
- DB_PASSWORD= pybl2026

## Ejecutar migraciones 
php artisan migrate

## Ejecutar datos de prueba
php artisan db:seed

## Iniciar el servidor de desarrollo
php artisan serve

## Datos del usuario administrador
- email = admin@puntoybarra.com
- contraseña = admin123

# Especificación de Requerimientos de Software

## 1. Introducción
### Propósito: 
Definir los requisitos funcionales y no funcionales de la aplicación web “Punto y Barra”, destinada a la venta de artículos de librería online.
### Alcance: 
Gestión de usuarios, catálogo de libros, carrito de compras, pagos online y administración de stock. No contempla integración con marketplaces externos ni logística avanzada.
#### Definiciones y siglas:
- ERS: Especificación de Requerimientos de Software
- GUI: Interfaz Gráfica de Usuario
- Admin: Usuario con permisos de administrador
- Referencias: Documentación de Laravel, manual de Bootstrap, guías de integración de pasarelas de pago.
## 2. Descripción general
### Perspectiva del producto: 
Aplicación web responsive desarrollada con Laravel y desplegada en servidores de la facultad.
#### Funciones del producto:
- Registro e inicio de sesión de usuarios.
- Búsqueda y filtrado de libros.
- Carrito de compras y checkout.
- Procesamiento de pagos.
- Gestión de catálogo y stock por parte del administrador.
- Características del usuario:
- Clientes con conocimientos básicos de navegación web.
- Administradores con formación técnica media.
### Restricciones:
- Backend en Laravel + PHP.
- Frontend con Bootstrap, HTML y CSS (mínimo uso de JS).
- Compatible con navegadores modernos.
- Tiempo de respuesta < 2 segundos.
- Suposiciones y dependencias:
- Requiere conexión estable a internet.
- Hosting provisto por la facultad.
- Integración con pasarela de pago (ej: MercadoPago).
## 3. Requisitos específicos
### Requisitos funcionales:
- RF1: El sistema debe permitir a los clientes registrarse con email y contraseña.
- RF2: El sistema debe validar usuarios mediante login.
- RF3: Los clientes podrán buscar libros por título, autor o género.
- RF4: El sistema debe permitir agregar y quitar libros del carrito.
- RF5: El sistema debe procesar pagos online y generar comprobantes.
- RF6: El administrador podrá cargar, editar y eliminar libros del catálogo.


### Requisitos no funcionales:
- RNF1: La interfaz debe ser intuitiva y accesible.
- RNF2: El sistema debe estar disponible el 99% del tiempo.
- RNF3: El tiempo de carga de cada pantalla debe ser menor a 2 segundos.
- RNF4: La información sensible debe estar cifrada (HTTPS + encriptación).
- RNF5: El sistema debe soportar al menos 500 usuarios simultáneos.
### Casos de uso:
- Comprar un libro.
- Registrar un nuevo usuario.
- Administrar catálogo.
## 4. Apéndices
### 4.1 Glosario
- Carrito de compras: Módulo que permite al usuario seleccionar libros y almacenarlos temporalmente antes de la compra.
- Checkout: Proceso de confirmación de compra y pago.
- Pasarela de pago: Servicio externo que procesa transacciones (ej: MercadoPago).
- Admin: Usuario con permisos para gestionar catálogo, stock y usuarios.
### 4.2 Referencias técnicas
- Documentación oficial de Laravel (framework backend).
- Manual de Bootstrap (framework frontend).
- Guías de integración de MercadoPago.
- Normas de accesibilidad WCAG 2.1.
### 4.3 Suposiciones adicionales
- El sistema será utilizado principalmente en Argentina, por lo que se contemplan métodos de pago locales.
- El catálogo inicial tendrá aproximadamente 200 libros, con posibilidad de expansión.
- El sistema se desplegará en un servidor de la facultad, con mantenimiento básico provisto por el equipo docente

# Licencia
Este proyecto está bajo la Licencia MIT - ver el archivo LICENSE para más detalles.

# Agradecimientos
- Laravel - El framework PHP para artesanos web
- Bootstrap - Framework CSS
- MariaDB - Sistema de base de datos
