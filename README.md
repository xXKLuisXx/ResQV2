<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Resq App
## Integrantes
Luis López

Francisco Hernandez

## Objetivo del proyecto
Ser un red de apoyo moral a personas en situación de violencia, mediante el uso de una plataforma que permite interactuar entre usuarios mostrando a manera de anécdotas o historias evidenciadas su situación, para de ésta manera obtener ayuda profesional, durante su etapa de apoyo en la plataforma.

## Abstract
Los usuarios podrán crear historias dónde narren su situación y los demás usuarios podrán retroalimentar su historia por medio de comentarios, buscando siempre mostrar apoyo e interés en que la persona salga de su situación de violencia .

Las historias pueden ser publicas y privadas y si se cree conveniente puede contener imagenes, además cada comentario puede ser evaluado en una escala de 1-5, dicha evaluación será reflejada en el perfil del usuario que comento, para por medio de esas evaluaciones crearle al usuario una reputación dentro de la plataforma.

## Instalación básica
Esta aplicación se encuentra en desarrollo

Para lograr ejecutar esta aplicación es necesario realizar los siguientes pasos:

1.  Clonar el repositorio en una carpeta local.
2.  Con la consola posicionarse dentro de la carpeta obtenida y ejecutar el siguiente comando: (**composer install**).
3.  Crear un **.env** con el siguiente comando: (**copy .env.example .env**).
4.  Crear una llave de laravel con el siguiente comando: (**php artisan key:generate**).
5.  La base de datos debe tener el cotejamiento: (**utf8mb4_spanish_ci**).
5.  Modificar el archivo **.env** y colocar los datos relacionados a la base de datos local y todas las variables necesarias (*pedir el **.env** a un administrador*).
6.  Ejecutar todas las migraciones y las semillas con el comando: (**php artisan migrate:fresh --seed**).

## Configuración .env to mailtrap
1.  Crear una cuenta en mailtrap.io.
2.  Abrir **Demo inbox**.
3.  Copiar las credenciales para usario y contraseña.
4.  Pegarlas en el archivo de configuracion **.env**.

## Configuración imágenes storage
1. Ejecutar el siguiente comando: (**php artisan storage:link**).
