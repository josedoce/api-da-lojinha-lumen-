<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Usuario extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;
    protected $table = "usuario";
    protected $primaryKey = "uuid";

    protected $fillable = [
        "nome",
        "idade"
    ];
    protected $hidden = [
        "created_at",
        "updated_at"
    ];
    public function numero(){
        return $this->hasOne(Numero::class, 'id_usuario');
    }
}
