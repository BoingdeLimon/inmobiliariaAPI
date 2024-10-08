# Sistema de Rentas - API

Esta es la API desarrollada en **Laravel 11** para gestionar el sistema de rentas de usuarios. Permite realizar operaciones CRUD para inmuebles, gestionar usuarios, roles y permisos, y ofrece un historial de rentas con gráficas y generación de PDF con código QR.

## Tecnologías utilizadas

- **Laravel 11**
- **PHP 8.x**
- **MySQL** (o el sistema de base de datos que se utilice)
- **Composer**
- **Eloquent ORM**
- **JWT (JSON Web Token)** para autenticación
- **QrCode** (para la generación de códigos QR)
- **Apache** (servidor compatible)

## Características

- **Autenticación**: Gestión de usuarios con login y registro, incluyendo roles y permisos.
- **Gestión de inmuebles**: Crear, editar, eliminar y listar inmuebles.
- **Búsquedas avanzadas**: Filtrar inmuebles por parámetros como tamaño, número de cuartos, baños, etc.
- **Generación de PDF con QR**: Cada inmueble tiene la opción de generar un PDF con un código QR que redirige a su página de detalles.
- **Historial de rentas**: Los usuarios pueden ver un historial de sus inmuebles rentados, con gráficas detalladas.
- **Paginación y filtros**: Listados con paginación y múltiples filtros de búsqueda.
- **Seeders**: Datos precargados mediante seeders para facilitar las pruebas.

## Requisitos

- **PHP 8.x** o superior
- **Composer**
- **MySQL** o cualquier otro sistema de base de datos compatible
- **Servidor Apache**

## Features

- **Autenticación de usuarios**: Login y registro de usuarios, gestión de roles y permisos.
- **Gestión de inmuebles**: CRUD para registrar propiedades en alquiler (casas, departamentos, etc.).
- **Generación de PDF**: Genera un PDF de cada propiedad con un código QR que redirige a la página de detalles.
- **Búsquedas avanzadas**: Permite realizar búsquedas por múltiples parámetros (tamaño, cuartos, baños, etc.).
- **Historial de rentas**: Registro histórico de las rentas con gráficas que muestran estadísticas.
- **Validación de datos**: Validaciones tanto en el backend como en el frontend.
- **Paginación y filtros**: Listados con paginación y filtros avanzados para facilitar la navegación.
- **Layout responsivo**: Diseño responsivo con Tailwind CSS, adaptable a cualquier dispositivo.
- **Seeders**: Datos precargados mediante seeders para facilitar el desarrollo y pruebas.

## Instalación

1. **Clonar el repositorio**

   ```bash Copy code
   git clone https://gitlab.com/dragonroliver/urbaninmo-api.git
   cd <nombre-del-repositorio>
   ```

2. **Instalar dependencias**

```bash Copy code
  composer install
```

3. **Configurar el archivo .env**

Copia el archivo de configuración .env.example a .env:

```bash Copy code
cp .env.example .env
```

Luego, actualiza las variables de entorno en el archivo .env para conectar la base de datos y configurar las credenciales necesarias:

```bash Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<nombre-de-la-base-de-datos>
DB_USERNAME=<tu-usuario>
DB_PASSWORD=<tu-contraseña>
JWT_SECRET=<llave-secreta-jwt>
```

4. **Migraciones y Seeders**
   Ejecuta las migraciones y seeders para crear las tablas y datos iniciales en la base de datos:

```bash Copy code
php artisan migrate --seed
```

5. **Iniciar el servidor local**

Inicia el servidor de desarrollo local de Laravel:

```bash Copy code
php artisan serve
```

La API estará disponible en http://localhost:8000.

## Endpoints de Items

### Obtener todos los items

```bash
GET /api/items
```

Este endpoint devuelve una lista de todos los items disponibles.

#### Headers

| Header        | Tipo   | Descripción                             |
| :------------ | :----- | :-------------------------------------- |
| Authorization | string | Requerido. Token JWT para autenticación |

**Respuesta Exitosa:**

**Código:** 200 OK  
**Ejemplo de respuesta:**

```json
[
  {
    "id": 1,
    "name": "Item 1",
    "description": "Descripción del Item 1"
  },
  {
    "id": 2,
    "name": "Item 2",
    "description": "Descripción del Item 2"
  }
]
```

### Obtener un item por ID

```bash
GET /api/items/{id}
```

Este endpoint devuelve la información detallada de un item específico.

#### Parámetros de ruta:

| Parámetro | Tipo     | Descripción                     |
| :-------- | :------- | :------------------------------ |
| `id`      | `string` | Requerido. ID del item a buscar |

#### Headers

| Header        | Tipo   | Descripción                             |
| :------------ | :----- | :-------------------------------------- |
| Authorization | string | Requerido. Token JWT para autenticación |

**Respuesta Exitosa:**

**Código:** 200 OK  
**Ejemplo de respuesta:**

```json
{
  "id": 1,
  "name": "Item 1",
  "description": "Descripción detallada del Item 1",
  "price": 100,
  "stock": 20
}
```

**Respuesta de Error:**

**Código:** 404 Not Found  
**Ejemplo de respuesta:**

```json
{
  "message": "Item no encontrado"
}
```

## Errores comunes

| Código | Descripción                |
| :----- | :------------------------- |
| 400    | Solicitud malformada       |
| 401    | No autenticado             |
| 404    | No encontrado              |
| 500    | Error interno del servidor |

## Tests

Para ejecutar las pruebas unitarias:

```bash
php artisan test
```

## Contribuir

1. Haz un fork del proyecto.
2. Crea una nueva rama (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza tus cambios y haz commit (`git commit -m 'Añadida nueva funcionalidad'`).
4. Haz push a la rama (`git push origin feature/nueva-funcionalidad`).
5. Abre un Pull Request en GitLab.

## Licencia

Este proyecto está bajo la licencia del TEC.

```
Este **README** ahora incluye una sección **Features** que destaca las funcionalidades principales de la API, junto con la referencia de la API, requisitos, instalación y más. Puedes ajustarlo según lo que necesites agregar o modificar.
```
