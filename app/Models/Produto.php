<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $fillable = ["nome", "descricao", "imagem", "preco", "categoria"];

    public function pedido()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_id');
    }
}
