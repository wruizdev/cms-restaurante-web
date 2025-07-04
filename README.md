# Sistema Web + CMS para Restaurante

Proyecto completo que incluye una página web pública y un sistema de gestión (CMS) para la administración de un restaurante. Desarrollado con Laravel, Blade, Bootstrap, JavaScript y más.

## Funcionalidades

- Autenticación y gestión de usuarios con roles: Superusuario y Admins (middleware)
- CRUD completo para:
  - Mesas
  - Platos (con imagen)
  - Posts (con CKEditor + imagen)
  - Reservas
- Gestión avanzada de reservas:
    - Notificaciones dinámicas de nuevas reservas en tiempo real (**AJAX + JavaScript**)
  - El panel de reservas se actualiza automáticamente cada 10 segundos sin recargar la página
  - La **mesa se marca automáticamente como ocupada** al confirmarse la reserva
  - Las mesas se pueden liberar desde el panel
- Panel de estadísticas interactivas con Chart.js:
    - Horarios con más reservas
  - Mesas más solicitadas
  - Distribución por día y hora
- Subida de imágenes al storage del servidor y almacenamiento de ruta en la base de datos
- Diseño responsive en web y móvil

---

## Tecnologías utilizadas

- Laravel 11
- Php 8.2+
- Blade
- Bootstrap 5
- JavaScript / AJAX
- CKEditor
- Chart.js
- MySQL

---

## ⚙️ Instalación y ejecución local

## ⚙️ Requisitos previos

Antes de empezar asegúrate de tener instalado:

- PHP >= 8.2  
- Composer  
- MySQL  
- Node.js y NPM  
- Laravel CLI (opcional)

---

### 1. Clona el repositorio

```bash
git clone https://github.com/wruizdev/cms-restaurante-web.git
cd tu-repo
```
### 2. Instalar dependencias
```bash
composer install
npm install
````

### 3. Compilar assets Frontend
Para desarrollo (recomendado):
```bash
npm run dev
``````
Para producción (opcional):
```bash
npm run build
``````


### 4. Configura el entorno
```bash
cp .env.example .env
php artisan key:generate
````
Edita tu .env con los credenciales de tu base de datos:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=restaurante_db
DB_USERNAME=root
DB_PASSWORD=
``````

### 5. Configurar storage y enlaces simbólicos
```bash
php artisan storage:link
``````
### 6. Importar base de datos
Usa el archivo **restaurante_db.sql** incluido en **/database/restaurante.sql.** Puedes importarlo con:
```bash
mysql -u root -p restaurante < database/restaurante_db.sql
``````
También está la opción de crear una base de datos desde interfaz gráfica con el nombre **restaurante_db** e importar el script en la base de datos creada.

### 7. Ejecutar el servidor local
```bash
php artisan storage:link
``````
Abre tu navegador en: http://localhost:8000

---

## Accesos de prueba
| Rol          | Usuario                                                 | Contraseña |
| ------------ | ------------------------------------------------------- | ---------- |
| Superusuario | [superadmin@example.com](mailto:superadmin@example.com) | Admin123   |
| Admin        | [admin@example.com](mailto:admin@example.com)           | Admin123   |
