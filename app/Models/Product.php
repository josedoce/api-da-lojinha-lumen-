<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    public function announcement()
    {
        return $this->hasOne(Announcements::class);
    }
}
