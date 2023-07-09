# 🚍Safey - Aplicativo Web para las Cooperativas

Safey es un sistema que permite la gestión y venta de pasajes a usuarios de buses interprovinciales en Ecuador.
La presente aplicación web tiene como propósito proporcionar la administración de la información de buses, frecuencias y ventas de una cooperativa.

## 👣 Primeros Pasos

Estas instrucciones te guiarán en la configuración y ejecución de la aplicación en tu entorno local para propósitos de desarrollo y pruebas.

### ✔️ Prerrequisitos

Asegúrate de tener instalado lo siguiente:

- [Servidor web](https://www.apachefriends.org/download.html)
  Para este proyecto se utilizó el servidor Apache proporcionado por la herramienta XAMPP [🔗](https://www.apachefriends.org/download.html) pero también puedes utilizar otros servidores similares de tu preferencia.
  💡 Recuerda que este proyecto utiliza PHP, JavaScript y AJAX. Verifica la compatibilidad con la herramienta que elijas.
- [Repositorio - Backend](https://github.com/YadiraAllauca/ServiciosProyectoDAS)
  Los enlaces a los servicios y la base de datos que se encuentran implicados en el código de este proyecto están alojados en un HostingWeb. Pero puedes verificar la estructura en el repositorio de backend. Te recomendamos revisar la documentación [🔗](https://github.com/YadiraAllauca/ServiciosProyectoDAS)

## ⚙️ Instalación

1. Clona el repositorio en tu máquina local dentro de htdocs del directorio de XAMPP:

```bash
git clone https://github.com/Eldinosaur/ProyectoDASBusesOficinista.git
```

2. Verificación del funcionamiento
   Cuando levantes Apache en XAMPP podrás acceder ya a la app con localhost.
   <img src="https://cdn.glitch.global/1d3dd682-c1e7-4386-94b7-857b9d3c741b/336d7ee0-3fe8-445c-9511-4c3b6f6db328.jpg?v=1688944036407" width="400">
   ⚠️El proyecto incluye la carpeta de Bootstrap con los estilos y componentes necesarios. No es necesario instalar nada adicional.
3. El almacenamiento de fotografías se está efectuando con conexión a un proyecto personal en Firebase<img src="https://www.gstatic.com/mobilesdk/160503_mobilesdk/logo/2x/firebase_28dp.png" alt="Logo de Firebase" width="20">
   Si deseas manejar tu propio almacenamiento en esta plataforma, puedes revisar la documentación: [🔗](https://firebase.google.com/docs/storage?hl=es-419)

## 💻 Uso

#### Login

Te permitirá ingresar como usuario oficinista. Su funcionalidad en código está presente en **login.php**
![Localhost](https://cdn.glitch.global/1d3dd682-c1e7-4386-94b7-857b9d3c741b/650c17ba-0aa3-48a6-a601-a3b7f3b5cf7a.jpg?v=1688944531184)

#### Gestión Buses

En esta interfaz se encuentra implementado un CRUD para Buses a excepción de la eliminación con el fin de mantener la integridad de los datos. Una funcionalidad adicional es la asignación de viajes a cada bus. Además se puede observar los viajes asignados presionando en el último ícono de cada fila. Los archivos a revisar para el manejo de este módulo son:

- **views/modules/busesoficinista.php**
- **views/modules/newbusoficinista.php**
- **views/modules/updatebusoficinista.php**
- **views/modules/tripsformoficinista.php**
- **views/modules/tripsoficinista.php.php**
  ![Localhost](https://cdn.glitch.global/1d3dd682-c1e7-4386-94b7-857b9d3c741b/0390378c-d61e-4f52-8326-36f7e9ea559b.jpg?v=1688886570397)

⚠️La forma de conectar a firebase se encuentra en el archivo newbusoficinista.php
```php
 var firebaseConfig = {
      apiKey: "AIzaSyAZa0vsgcykehIk-x1Fh_VLShy5oHesm94",
      storageBucket: "gs://facturamovil-cd677.appspot.com"
    };

    firebase.initializeApp(firebaseConfig);
```

#### Gestión Frecuencias
En esta interfaz se encuentra implementada la función de habilitar o deshabilitar frecuencia. Los archivos a revisar para el manejo de este módulo son:
- **views/modules/frequenciesoficinista.php**
- **views/modules/updatefrequencyoficinista.php**
  ![Localhost](https://cdn.glitch.global/1d3dd682-c1e7-4386-94b7-857b9d3c741b/1a8ad039-0923-42c6-b0c9-c65a64506849.jpg?v=1688945073741)

#### Gestión de Ventas

En esta interfaz el usuario puede efectuar una venta de un boleto de viaje. Los archivos a revisar para el manejo de este módulo son:

- **views/modules/newsaleoficinista.php**
- **views/modules/salesoficinista.php**
  ![Localhost](https://cdn.glitch.global/1d3dd682-c1e7-4386-94b7-857b9d3c741b/545de8de-ed10-4a49-a82d-d3b8e06dfb05.jpg?v=1688945183445)

#### Validación Ventas

En esta interfaz se encuentra implementada la función para validar el comprobante de venta. Los archivos a revisar para el manejo de este módulo son:

- **views/modules/validationformoficinista.php**
- **views/modules/validationformoficinista.php**
  ![Localhost](https://cdn.glitch.global/1d3dd682-c1e7-4386-94b7-857b9d3c741b/684cb6cc-adb1-48d3-92d7-542c3aad2ff3.jpg?v=1688945400371)

#### Perfil de Usuario

En esta interfaz se encuentra implementada la edición de datos y contraseña del usuario. Los archivos a revisar para el manejo de este módulo son:

- **views/modules/newpasswordoficinista.php**
- **views/modules/userformoficinista.php**
- **views/modules/userprofileoficinista.php**
  ![Localhost](https://cdn.glitch.global/1d3dd682-c1e7-4386-94b7-857b9d3c741b/543664fe-7cce-493c-823d-9040203a8ffb.jpg?v=1688945693869)

## 🤝 Contribución

Si deseas contribuir a este proyecto, sigue los siguientes pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama:

```bash
git checkout -b nombre-de-la-rama
```

3. Realiza los cambios y haz commit:

```bash
git commit -m "Descripción de los cambios"
```

4. Envía los cambios a tu fork:

```bash
git push origin nombre-de-la-rama
```

5. Crea una pull request en este repositorio.

## ©️ Licencia

Este proyecto académico no tiene una licencia específica asignada. Todos los derechos de autor pertenecen a los miembros del equipo de desarrollo. Ten en cuenta que esto significa que no se otorgan permisos explícitos para utilizar, modificar o distribuir el código fuente o los archivos relacionados. Cualquier uso, reproducción o distribución del proyecto debe obtener permiso previo.

## 📧 Contacto

Si tienes alguna pregunta o comentario, puedes contactarte con los miembros del equipo de desarrollo:

- anaranjo1676@uta.edu.ec
- dpinchao9519@uta.edu.ec
- kzamora7938@uta.edu.ec
- tarmijos0985@uta.edu.ec
- yallauca3770@uta.edu.ec
