<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $table = 'ranking';
    public $timestamps = false;
    public function products(){
        return $this->hasMany(Product::class, 'ranking_id');
    }
}
