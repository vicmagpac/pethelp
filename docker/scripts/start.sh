#!/bin/bash

echo "🐾 Iniciando PetHelp com Docker..."

# Verificar se o Docker está rodando
if ! docker info > /dev/null 2>&1; then
    echo "❌ Docker não está rodando. Por favor, inicie o Docker primeiro."
    exit 1
fi

# Construir e iniciar os containers
echo "📦 Construindo containers..."
docker-compose up -d --build

# Aguardar um pouco para o banco inicializar
echo "⏳ Aguardando inicialização do banco de dados..."
sleep 10

# Executar migrações
echo "🗄️ Executando migrações..."
docker-compose exec app php artisan migrate --force

# Executar seeders (se existirem)
if [ -f "backend/database/seeders/DatabaseSeeder.php" ]; then
    echo "🌱 Executando seeders..."
    docker-compose exec app php artisan db:seed --force
fi

# Gerar chave da aplicação
echo "🔑 Gerando chave da aplicação..."
docker-compose exec app php artisan key:generate

# Limpar cache
echo "🧹 Limpando cache..."
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan route:clear

echo "✅ PetHelp iniciado com sucesso!"
echo "🌐 Acesse: http://localhost:8000"
echo "📊 API: http://localhost:8000/api"
echo ""
echo "📋 Comandos úteis:"
echo "  docker-compose logs -f    # Ver logs"
echo "  docker-compose down       # Parar containers"
echo "  docker-compose restart    # Reiniciar containers" 