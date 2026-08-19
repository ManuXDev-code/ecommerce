<p align="center">
  <img src="https://laravel.com/img/logomark.min.svg" width="90" alt="Laravel">
</p>

<h1 align="center">🛒 Ecommerce</h1>

<p align="center">
  <strong>Plataforma de comercio electrónico desarrollada con Laravel 12 y NiceShop.</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.39.0-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Bootstrap-5.3.8-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
</p>

<p align="center">
  <a href="https://github.com/ManuXDev-code/ecommerce">
    <img src="https://img.shields.io/github/stars/ManuXDev-code/ecommerce?style=flat-square" alt="GitHub Stars">
  </a>
  <a href="https://github.com/ManuXDev-code/ecommerce">
    <img src="https://img.shields.io/github/forks/ManuXDev-code/ecommerce?style=flat-square" alt="GitHub Forks">
  </a>
  <a href="https://github.com/ManuXDev-code/ecommerce/issues">
    <img src="https://img.shields.io/github/issues/ManuXDev-code/ecommerce?style=flat-square" alt="GitHub Issues">
  </a>
</p>

---

## 🛍️ NiceShop — Ecommerce Template

<p align="center">
  <a href="https://bootstrapmade.com/niceshop-bootstrap-ecommerce-template/" target="_blank">
    <img 
      src="https://bootstrapmade.com/content/templatefiles/NiceShop/NiceShop-bootstrap-website-template.webp"
      width="100%"
      alt="NiceShop Ecommerce Template"
    >
  </a>
</p>

<p align="center">
  <strong>Interfaz basada en NiceShop – Modern eCommerce Bootstrap Template</strong>
</p>

<p align="center">
  <a href="https://bootstrapmade.com/niceshop-bootstrap-ecommerce-template/">
    🌐 Ver plantilla NiceShop
  </a>
</p>

---

## 📋 Sobre el proyecto

**Ecommerce** es una plataforma de comercio electrónico desarrollada con **Laravel 12**, integrando la plantilla **NiceShop** como base para la interfaz visual.

El proyecto combina el diseño moderno y responsive de NiceShop con la lógica de negocio desarrollada en Laravel, creando una aplicación orientada a la gestión de productos, usuarios, favoritos, carrito de compras, pedidos y procesos relacionados con una tienda online.

La aplicación utiliza una arquitectura **MVC**, **MySQL** como sistema de base de datos y **Blade** como motor de plantillas.

---

## ✨ Características

- 🛍️ Catálogo de productos
- 🔎 Visualización y detalle de productos
- 🛒 Carrito de compras
- ❤️ Sistema de productos favoritos
- 👤 Gestión de usuarios
- 🔐 Autenticación
- 📦 Gestión de pedidos
- 💳 Integración de pagos
- 🗄️ Base de datos MySQL
- 🎨 Interfaz basada en NiceShop
- 📱 Diseño responsive
- ⚙️ Panel de administración

---

## 🛒 Funcionalidades principales

### 🛍️ Productos

- Listado de productos
- Categorías
- Detalle de productos
- Imágenes de productos
- Control de información y disponibilidad

### ❤️ Favoritos

Los usuarios pueden agregar productos a su lista de favoritos para acceder rápidamente a ellos posteriormente.

### 🛒 Carrito

Sistema de carrito para:

- Agregar productos
- Modificar cantidades
- Eliminar productos
- Calcular totales
- Procesar la compra

### 📦 Pedidos

Gestión de pedidos realizados por los usuarios, permitiendo mantener un registro de las compras realizadas.

### 💳 Pagos

Integración del proceso de pago dentro del flujo de compra.

### 👤 Usuarios

Sistema de autenticación y administración de usuarios.

---

## 🎨 Plantilla NiceShop

El proyecto utiliza **NiceShop – Modern eCommerce Bootstrap Template** como base visual para la tienda.

NiceShop proporciona una interfaz moderna y responsive orientada específicamente a proyectos de comercio electrónico.

### 🧩 Elementos utilizados

- 🏠 Página principal
- 🛍️ Catálogo de productos
- 📦 Detalle de producto
- 🛒 Carrito de compras
- 💳 Checkout
- 🔐 Login y registro
- 👤 Cuenta de usuario
- 🧭 Navegación
- 📱 Diseño responsive
- 🎨 Componentes Bootstrap

<p align="center">
  <a href="https://bootstrapmade.com/niceshop-bootstrap-ecommerce-template/">
    <img 
      src="https://img.shields.io/badge/🌐_NiceShop-BootstrapMade-0d6efd?style=for-the-badge"
      alt="NiceShop"
    >
  </a>
</p>

> **Nota:** NiceShop se utiliza como plantilla frontend del proyecto. La integración con Laravel, la lógica de negocio, modelos, controladores, rutas, base de datos y funcionalidades corresponden al desarrollo de esta aplicación.

---

## 🛠️ Tecnologías utilizadas

| Tecnología | Uso |
|---|---|
| 🚀 Laravel 12.39.0 | Framework principal |
| 🐘 PHP | Desarrollo backend |
| 🗄️ MySQL | Base de datos |
| 🎨 Bootstrap 5.3.8 | Diseño frontend |
| 🧩 Blade | Motor de plantillas |
| ⚡ JavaScript | Interactividad |
| 🎨 HTML5 / CSS3 | Interfaz |
| 📦 Composer | Dependencias PHP |
| 📦 NPM | Dependencias frontend |
| 🐙 Git / GitHub | Control de versiones |

---

## 🏗️ Arquitectura

El proyecto utiliza la arquitectura **MVC (Model-View-Controller)** de Laravel.

```text
                 ┌─────────────────┐
                 │     Usuario     │
                 └────────┬────────┘
                          │
                          ▼
                 ┌─────────────────┐
                 │     Rutas       │
                 │    Laravel      │
                 └────────┬────────┘
                          │
                          ▼
                 ┌─────────────────┐
                 │   Controllers   │
                 └────────┬────────┘
                          │
                 ┌────────┴────────┐
                 ▼                 ▼
          ┌──────────────┐  ┌──────────────┐
          │    Models    │  │    Blade     │
          │   Eloquent   │  │   NiceShop   │
          └──────┬───────┘  └──────────────┘
                 │
                 ▼
          ┌──────────────┐
          │    MySQL     │
          └──────────────┘
