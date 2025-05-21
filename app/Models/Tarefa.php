<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'data_fim',
        'status',
        'user_id',
    ];

    protected $dates = [
        'data_fim',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
