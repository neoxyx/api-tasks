# API de Laravel para Gestión de Usuarios y Tareas

## Descripción
Este proyecto proporciona una API RESTful en Laravel para gestionar usuarios y tareas. Permite la creación de usuarios, login, logout y gestión de tareas por usuario.

## Instalación
1. Clonar el repositorio:
   ```sh
   git clone https://github.com/neoxyx/api-tasks
   cd api-tasks
   ```
2. Instalar dependencias:
   ```sh
   composer install
   ```
3. Configurar el archivo `.env`:
   ```sh
   cp .env.example .env
   ```
   - Configurar la conexión a la base de datos en `.env`
4. Generar clave de aplicación:
   ```sh
   php artisan key:generate
   ```
5. Ejecutar migraciones y seeders:
   ```sh
   php artisan migrate --seed
   ```
6. Iniciar el servidor:
   ```sh
   php artisan serve
   ```

## Endpoints

### Autenticación
#### 1. Registrar usuario
**POST** `/api/register`
**Body:**
```json
{
  "name": "John Doe",
  "email": "johndoe@example.com",
  "password": "123456"
}
```

#### 2. Iniciar sesión
**POST** `/api/login`
**Body:**
```json
{
  "email": "johndoe@example.com",
  "password": "123456"
}
```

#### 3. Cerrar sesión
**POST** `/api/logout`
```

---
### Tareas
#### 4. Crear tarea
**POST** `/api/tasks`
```
**Body:**
```json
{
  "title": "Nueva tarea",
  "description": "Descripción de la tarea"
}
```

#### 5. Listar tareas por usuario
**GET** `/api/tasks/user/{id_user}`
```

#### 6. Actualizar estado de tarea
**PATCH** `/api/tasks/{id}/status`
```
**Body:**
```json
{
  "status": "completed"
}
```

#### 7. Eliminar tarea
**DELETE** `/api/tasks/{id}`
```
#### 8. Tarea programada
Para que el scheduler corra, agrega el cronjob en el servidor ejecutando:
crontab -e
Y añade la siguiente línea:

* * * * * php /ruta/a/tu/proyecto/artisan schedule:run >> /dev/null 2>&1

## Tecnologías utilizadas
- Laravel
- MySQL
- PHP

## Autor
JHON JAIRO VALDÉS ARISTIZABAL

## Licencia
Este proyecto está bajo la licencia MIT.

