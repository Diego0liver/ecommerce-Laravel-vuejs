<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';
    protected $fillable = [
        'quantidade',
        'total',
        'status',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function produto()
    {
        return $this->belongsToMany(Produto::class, 'produto_id');
    }
    public function produt()
    {
        return $this->belongsToMany(Produto::class, 'pedido_produto');
    }
}
