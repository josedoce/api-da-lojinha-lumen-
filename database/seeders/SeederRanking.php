<?php

namespace Database\Seeders;

use App\Models\Ranking;
use Illuminate\Database\Seeder;

class SeederRanking extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            [
                'id'=>'1',
                'qualification'=>'promotions_day',
            ],
            [
                'id'=>'2',
                'qualification'=>'most_sold',
            ],
            [
                'id'=>'3',
                'qualification'=>'best_sellers',
            ],
            [
                'id'=>'4',
                'qualification'=>'appraised',
            ]
        ];
        foreach ($dados as $dado) {
            Ranking::create([
                'id'=>$dado['id'],
                'qualification'=>$dado['qualification'],
            ]);

        }
    }
}
