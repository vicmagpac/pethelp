FROM php:8.2-fpm

# Argumentos para configuração
ARG user=laravel
ARG uid=1000

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip

# Limpar cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Obter Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Criar usuário do sistema para executar comandos Composer e Artisan
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Definir diretório de trabalho
WORKDIR /var/www

# Copiar arquivos do projeto
COPY . /var/www

# Instalar dependências do Composer
RUN composer install --no-dev --optimize-autoloader

# Copiar arquivo de configuração
COPY .env.example .env

# Gerar chave da aplicação
RUN php artisan key:generate

# Definir permissões
RUN chown -R $user:$user /var/www
RUN chmod -R 755 /var/www/storage
RUN chmod -R 755 /var/www/bootstrap/cache

# Expor porta 9000
EXPOSE 9000

# Comando para iniciar o servidor
CMD ["php-fpm"] 