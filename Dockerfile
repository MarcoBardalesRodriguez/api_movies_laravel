# Utilizamos la imagen oficial de Laravel con soporte para PHP y MySQL
FROM laravel:10.0

# Instalamos la biblioteca libssh2
RUN apt-get update && apt-get install -y libssh2-1-dev

# Instalamos las extensiones adicionales que pueda requerir Octane
RUN docker-php-ext-install pcntl

# Instalamos la extensión ssh2 para Octane
RUN pecl install ssh2 && docker-php-ext-enable ssh2

# Instalamos la extensión swoole para Octane
RUN pecl install swoole && docker-php-ext-enable swoole

# Establecemos el directorio de trabajo
WORKDIR /app

# Copiamos los archivos de la aplicación
COPY . /app

# Instalamos las dependencias de Composer sin dev y optimizamos el autoloader
RUN composer install --no-dev --optimize-autoloader

# Copiamos el archivo .env
COPY .env.example .env

# Creamos el directorio para los logs
RUN mkdir -p /app/storage/logs

# Limpiamos caches y configuraciones
RUN php artisan cache:clear
RUN php artisan view:clear
RUN php artisan config:clear

# Generamos una nueva clave si no existe
RUN php artisan key:generate

# Ejecutamos las migraciones de la base de datos
RUN php artisan migrate

# Exponemos el puerto en el que escucha nuestra aplicación
EXPOSE 8000

# Ejecutamos Octane para servir la aplicación
CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=8000"]
