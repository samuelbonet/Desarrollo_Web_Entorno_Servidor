# Proyecto CRUD, 2º Desarrollo de Aplicaciones Web Vespertino, modulo Desarrollo Entorno Servidor, 2022-2023

Carlos Sesma Usarralde

- [Proyecto CRUD, 2º Desarrollo de Aplicaciones Web Vespertino, modulo Desarrollo Entorno Servidor, 2022-2023](#proyecto-crud-2º-desarrollo-de-aplicaciones-web-vespertino-modulo-desarrollo-entorno-servidor-2022-2023)
  - [Descripción](#descripción)
  - [Requisitos](#requisitos)
  - [Configuración](#configuración)

## Descripción

Este proyecto consiste en la creación de un CRUD (Create, Read, Update, Delete) de una tabla de una base de datos. El proyecto se ha realizado con el lenguaje PHP y la base de datos MySQL/MariaDB.

## Requisitos

- PHP 7.4
- PHPMyAdmin
- MySQL/MariaDB
- Servidor Apache

## Configuración

Para desplegar el proyecto se debe acceder a phpmyadmin con un usuario con permisos de gestion de usuarios("manuel" y "manuel12345" en este caso) y crear un nuevo usuario con permisos de SELECT, INSERT, UPDATE y  DELETE sobre las tablas de la base de datos "dwes".

Una vez creado debemos editar el archivo credenciales.php.example y cambiar los datos de usuario y contraseña por los del usuario creado anteriormente.

Por último, debemos renombrar el archivo credenciales.php.example a credenciales.php.

Tambien se debe crear la tabla "usuarios" en la base de datos "dwes" con los siguientes campos:

- user(varchar(50))
- pass(varchar(200))

```sql
CREATE TABLE `dwes`.`usuarios` ( `user` INT(50) NOT NULL , `pass` INT(200) NOT NULL ) ENGINE = InnoDB
```
