# 📚 Documentação da API - PetHelp

## 🔗 Base URL
```
http://localhost:8000/api/v1
```

## 🔐 Autenticação
A API utiliza Laravel Sanctum para autenticação via tokens.

### Headers necessários:
```
Authorization: Bearer {token}
Content-Type: application/json
Accept: application/json
```

## 👤 Usuários

### Registro
```http
POST /auth/register
```

**Body:**
```json
{
  "name": "João Silva",
  "email": "joao@email.com",
  "password": "senha123",
  "password_confirmation": "senha123"
}
```

### Login
```http
POST /auth/login
```

**Body:**
```json
{
  "email": "joao@email.com",
  "password": "senha123"
}
```

### Logout
```http
POST /auth/logout
```

## 🗺️ Pontos de Alimentação

### Listar todos os pontos
```http
GET /feeding-points
```

**Query Parameters:**
- `status`: filtro por status (empty, low, ok, full)
- `lat`: latitude para busca por proximidade
- `lng`: longitude para busca por proximidade
- `radius`: raio de busca em km (padrão: 5)

### Obter ponto específico
```http
GET /feeding-points/{id}
```

### Criar novo ponto
```http
POST /feeding-points
```

**Body:**
```json
{
  "name": "Parque da Cidade",
  "description": "Ponto de alimentação no parque central",
  "latitude": -23.5505,
  "longitude": -46.6333,
  "address": "Rua das Flores, 123",
  "food_type": "ração",
  "water_available": true
}
```

### Atualizar ponto
```http
PUT /feeding-points/{id}
```

### Deletar ponto
```http
DELETE /feeding-points/{id}
```

## 📱 Check-ins

### Fazer check-in
```http
POST /feeding-points/{id}/checkin
```

**Body:**
```json
{
  "food_level": "full", // empty, low, ok, full
  "water_level": "ok",  // empty, low, ok, full
  "notes": "Adicionei 2kg de ração",
  "photo": "base64_encoded_image"
}
```

### Histórico de check-ins
```http
GET /feeding-points/{id}/checkins
```

**Query Parameters:**
- `page`: número da página
- `per_page`: itens por página

## 🏆 Gamificação

### Perfil do usuário
```http
GET /profile
```

### Ranking da comunidade
```http
GET /leaderboard
```

**Query Parameters:**
- `period`: weekly, monthly, all_time
- `limit`: número de posições

### Conquistas
```http
GET /achievements
```

### Estatísticas pessoais
```http
GET /profile/stats
```

## 🔍 QR Code

### Gerar QR Code
```http
POST /feeding-points/{id}/qr-code
```

### Ler QR Code
```http
POST /qr-code/scan
```

**Body:**
```json
{
  "qr_code": "pethelp_point_123"
}
```

## 📊 Relatórios

### Estatísticas gerais
```http
GET /reports/overview
```

### Relatório por região
```http
GET /reports/region
```

**Query Parameters:**
- `lat`: latitude
- `lng`: longitude
- `radius`: raio em km

## 🚨 Alertas

### Criar alerta
```http
POST /alerts
```

**Body:**
```json
{
  "type": "emergency", // emergency, maintenance, info
  "title": "Animal ferido",
  "description": "Cachorro com pata machucada",
  "latitude": -23.5505,
  "longitude": -46.6333,
  "priority": "high" // low, medium, high
}
```

### Listar alertas
```http
GET /alerts
```

**Query Parameters:**
- `type`: tipo do alerta
- `priority`: prioridade
- `status`: open, closed

## 📝 Respostas

### Sucesso
```json
{
  "success": true,
  "data": {},
  "message": "Operação realizada com sucesso"
}
```

### Erro
```json
{
  "success": false,
  "message": "Mensagem de erro",
  "errors": {
    "field": ["Erro específico do campo"]
  }
}
```

## 📄 Códigos de Status

- `200` - Sucesso
- `201` - Criado
- `400` - Bad Request
- `401` - Não autorizado
- `403` - Proibido
- `404` - Não encontrado
- `422` - Validação falhou
- `500` - Erro interno do servidor 