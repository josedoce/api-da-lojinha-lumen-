<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Ramsey\Uuid\Uuid;

class Cliente extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;
    protected static function booted(){
        static::creating(fn(Cliente $cliente)=>$cliente->uuid = (string) Uuid::uuid4());
    }

    protected $table = "cliente";
    protected $primaryKey = "uuid";
    public $incrementing = false;//sem isso ele nao devolve o uuid corretamente. 

    protected $fillable = [
        "uuid",
        "nome",
        "sobrenome",
        "email",
        "senha",
        "token",
        "isCliente",
        "isVendedor",
        "agencia",
        "conta",
        "cpf_cnpj",
        "n_cartao",
        "titular",
        "validade",
        "endereco",
        "celular",
    ];
    protected $hidden = [
        "created_at",
        "updated_at"
    ];
    // public function numero(){
    //     return $this->hasOne(Numero::class, 'id_usuario');
    // }
}
