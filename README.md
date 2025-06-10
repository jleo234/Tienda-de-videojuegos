# Documentación del Proyecto Web

1. Introducción

La finalidad de este proyecto es crear un portal donde se genere difusión sobre los videojuegos, además de la venta de estos mismos. La creación de esta pagina fue algo complicada, esto por contratiempos, así como el poco conocimiento que se posee sobre el desarrollo de paginas web, aunque el mayor problema fue la negligencia de la mayoría de los integrantes del equipo,
como por ejemplo el compañero Rommel Alexis López al cuadrado (soy yo el que está redactando esto)

2. Resumen del Sistema

La página contiene múltiples secciones como:
- Noticias destacadas (noticia1.html, noticia2.html, noticia3.html)
- Categorías de juegos: Acción y Aventura, JRPG (accionyaventura.html, jrpg.html)
- Blog informativo (blog.html)
- Funcionalidad básica de autenticación (inicio_sesion.php)
- Página de inicio (index.html)

Si bien la plataforma aún está en desarrollo, la base funcional y visual está estructurada para futuras expansiones.

3. Requisitos

- a. Requisitos Funcionales y No Funcionales

*Funcionales:**
- Visualización de contenido organizado por secciones.
- Capacidad de inicio de sesión mediante formulario.
- Navegación básica entre páginas internas.

*No Funcionales:*
- Interfaz amigable y accesible.
- Estructura modular de páginas para facilitar el mantenimiento.
- Uso de HTML, CSS y PHP sin frameworks externos.

- b. Requisitos Técnicos

- Servidor compatible con PHP (Apache, Nginx con PHP-FPM, etc.)
- Navegador actualizado (Chrome, Firefox, Edge)
- Editor de texto para desarrolladores (VS Code, Sublime, etc.)

- c. Requisitos de Arquitectura del Sistema

- Arquitectura cliente-servidor básica.
- Frontend: HTML5 + CSS3.
- Backend: PHP para conexión e inicio de sesión.
- Base de datos planificada pero no completamente implementada.

4. Instalación

---1. Clonar o descargar este repositorio en tu máquina local.
---2. Colocar el contenido en el directorio raíz de tu servidor local (por ejemplo, `htdocs` si usas XAMPP).
---3. Asegurarse de tener un servidor web corriendo (Apache) con soporte para PHP.
---4. (Opcional) Configurar una base de datos local para la funcionalidad de inicio de sesión.

5. Uso del Sistema

- Acceder a `index.html` desde el navegador para visualizar la página principal.
- Navegar mediante los enlaces del menú para consultar secciones específicas.
- Usar el formulario de `inicio_sesion.php` para simular autenticación de usuario.
- La conexión a base de datos está parcialmente configurada (`conexion.php`), aunque no se integra completamente.

6. Base de Datos (Modelado)

Se incluye el archivo `conexion.php` y `conexion.txt`, que sugieren un esquema de conexión con base de datos MySQL. El sistema aún no tiene tablas implementadas ni funcionalidades como registro, almacenamiento de usuarios o comentarios.

**Modelo esperado (no implementado):**

```sql
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50),
    contraseña VARCHAR(255),
    correo_electronico VARCHAR(100)
);
```