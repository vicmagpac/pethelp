# 🐾 PetHelp - Ajudando Animais de Rua

Um aplicativo inovador para conectar pessoas que querem ajudar animais de rua através de pontos de alimentação distribuídos pela cidade.

## 📋 Sobre o Projeto

O PetHelp é uma plataforma que permite:
- **Mapeamento de pontos de alimentação** para animais de rua
- **Sistema de QR Code** para check-in e identificação dos pontos
- **Gamificação** com pontos por ajudar
- **Status em tempo real** do nível de ração e água
- **Comunidade engajada** para ajudar animais

## 🏗️ Arquitetura

- **Backend**: Laravel 10 (PHP) + PostgreSQL
- **Frontend**: Angular 18 (TypeScript)
- **Banco de Dados**: PostgreSQL
- **Cache**: Redis
- **Web Server**: Nginx
- **Containerização**: Docker

## 📁 Estrutura do Projeto

```
pethelp/
├── backend/          # API Laravel
├── frontend/         # Aplicação Angular
├── docker/           # Configurações Docker
│   ├── nginx/        # Configuração Nginx
│   └── scripts/      # Scripts de automação
├── docs/            # Documentação
└── README.md        # Este arquivo
```

## 🚀 Como Executar

### 🐳 Com Docker (Recomendado)

**Pré-requisitos:**
- Docker
- Docker Compose

**Passos:**
```bash
# Clone o repositório
git clone https://github.com/seu-usuario/pethelp.git
cd pethelp

# Execute o script de inicialização
./docker/scripts/start.sh
```

**Acesso:**
- 🌐 Aplicação: http://localhost:8000
- 📊 API: http://localhost:8000/api
- 🗄️ PostgreSQL: localhost:5432
- 🔴 Redis: localhost:6379

**Comandos úteis:**
```bash
# Ver logs
docker-compose logs -f

# Parar containers
docker-compose down

# Reiniciar containers
docker-compose restart

# Executar comandos no container
docker-compose exec app php artisan migrate
```

### 🔧 Desenvolvimento Local

#### Backend (Laravel)

```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

#### Frontend (Angular)

```bash
cd frontend
npm install
ng serve
```

## 🔧 Funcionalidades Principais

### 1. Pontos de Alimentação
- Cadastro de locais com coordenadas
- QR Code único para cada ponto
- Status de ração e água
- Histórico de check-ins

### 2. Sistema de Gamificação
- Pontos por check-in
- Ranking da comunidade
- Conquistas e badges
- Histórico pessoal

### 3. Mapa Interativo
- Visualização de todos os pontos
- Filtros por status
- Navegação integrada
- Informações detalhadas

### 4. Comunidade
- Perfil de usuário
- Estatísticas de ajuda
- Chat comunitário
- Alertas de emergência

## 🎯 Próximos Passos

- [x] Configuração do Docker
- [x] Estrutura inicial do projeto
- [ ] Configuração do banco de dados
- [ ] API de autenticação
- [ ] CRUD de pontos de alimentação
- [ ] Sistema de QR Code
- [ ] Integração com Google Maps
- [ ] Interface do usuário
- [ ] Sistema de gamificação
- [ ] Testes automatizados

## 🤝 Contribuição

Este é um projeto open-source para ajudar animais de rua. Contribuições são bem-vindas!

Veja o arquivo [CONTRIBUTING.md](CONTRIBUTING.md) para detalhes sobre como contribuir.

## 📄 Licença

MIT License - veja o arquivo [LICENSE](LICENSE) para detalhes.

---

**Feito com ❤️ para ajudar os animais de rua** 