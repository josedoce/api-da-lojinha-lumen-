<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    protected $table = 'announcements';
    /**
     * Tradução livre:
     * belongsTo
     * ->pertêrence a 'fulano'
     * ->é de 'fulano'
     * Exemplos:
     * Chifre pertente a Cabeça
     * Boi pertence a Leticia
    */
    public function product(){
        /**
         * fixe bem:
         * Ao definir a foreign, vocês estará dizendo a este model:
         * Busque na tabela produto, com base no id ou product_id desta
         * tabela.
         * Obs: O recomendado é que esta classe busque o dado na tabela
         * produto, com base no seu product_id, pois se for com base no
         * id desta tabela, o id de uma das linhas dessa tabela(announcements)
         * será usado na query para buscar produto e possivelmente, não ba-
         * terá os dados.
         * */
        //procurará o produto em announcements pelo product_id dele.
        return $this->belongsTo(Product::class, 'product_id');

        //procurará o produto em announcements pelo id dele.
        //return $this->belongsTo(Product::class, 'id');
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
