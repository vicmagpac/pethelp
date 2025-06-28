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

- **Backend**: Laravel 10 (PHP)
- **Frontend**: Angular 18 (TypeScript)
- **Banco de Dados**: MySQL/PostgreSQL
- **APIs**: Google Maps, QR Code generation

## 📁 Estrutura do Projeto

```
pethelp/
├── backend/          # API Laravel
├── frontend/         # Aplicação Angular
├── docs/            # Documentação
└── README.md        # Este arquivo
```

## 🚀 Como Executar

### Backend (Laravel)

```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

### Frontend (Angular)

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

## 📄 Licença

MIT License - veja o arquivo LICENSE para detalhes.

---

**Feito com ❤️ para ajudar os animais de rua** 