[DISPENSACION ADMIN]

Este proyecto fue creado con Laravel Framework 9.52.5 y se centra en realizar un sistema de facturación que permita
efectuar un CRUD en su modelo.

Instalación

-- Clonar el repositorio en tu máquina local:
git clone https://github.com/cap-marin/dispensacion-laravel.git

-- Navegar a la carpeta del proyecto:
cd SistemaFacturacion

-- Instalar las dependencias del proyecto:
composer install

-- Crear un archivo .env y configurar las variables de entorno:
cp .env.example .env
php artisan key:generate

-- Configurar la conexión a la base de datos en el archivo .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Dispensacion
DB_USERNAME=(tu_username)
DB_PASSWORD=(tu_password)

-- Ejecutar las migraciones y los seeders para llenar la base de datos con datos de ejemplo:
php artisan migrate ó php artisan migrate --seed

-- Ejecutar el servidor web de Laravel:
php artisan serve

[Uso]
Este proyecto contiene un inicio de sesión el cual. para efectos de pruebas cuenta con las siguientes credenciales de usuario:
correo electrónico: facpru@gmail.com
contraseña: Pru12345

Contribuir
Si quieres contribuir al proyecto, por favor sigue estos pasos:

Hacer un fork del repositorio
Clonar el repositorio en tu máquina local
git clone https://github.com/cap-marin/dispensacion-laravel.git
Crear una rama para tu contribución

git checkout -b [nombre de tu rama]
Hacer tus cambios y commit:
git add .
git commit -m "[mensaje de tu commit]"

Hacer push a tu rama en el repositorio fork:
git push origin [nombre de tu rama]
Hacer una solicitud de extracción (pull request) a la rama principal del proyecto

Licencia
Este proyecto está bajo la licencia Steph Marin. Consulta el archivo LICENSE para más detalles.




