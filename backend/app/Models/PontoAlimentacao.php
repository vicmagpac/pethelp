<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PontoAlimentacao extends Model
{
    use HasFactory;

    protected $table = 'pontos_alimentacao';

    protected $fillable = [
        'nome',
        'descricao',
        'latitude',
        'longitude',
        'endereco',
        'tipo_racao',
        'agua_disponivel',
        'status_racao',
        'status_agua',
        'qr_code',
        'criado_por'
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'agua_disponivel' => 'boolean',
    ];

    /**
     * Relacionamento com o usuário que criou o ponto
     */
    public function criador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'criado_por');
    }

    /**
     * Gerar QR Code único para o ponto
     */
    public static function gerarQrCode(): string
    {
        return 'pethelp_' . uniqid() . '_' . time();
    }

    /**
     * Verificar se o ponto precisa de atenção
     */
    public function precisaAtencao(): bool
    {
        return in_array($this->status_racao, ['vazio', 'baixo']) || 
               in_array($this->status_agua, ['vazio', 'baixo']);
    }
}
