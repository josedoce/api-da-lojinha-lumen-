<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class SeederCategory extends Seeder
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
                'id'=>1,
                'category'=>'Acessórios de Tecnologia',
                'slug'=>'acessorios-de-tecnologia'
            ],
            [
                'id'=>2,
                'category'=>'Ar e Ventilação',
                'slug'=>'ar-e-ventilacao'
            ],
            [
                'id'=>3,
                'category'=>'Artesanato',
                'slug'=>'artesanato'
            ],
            [
                'id'=>4,
                'category'=>'Artigos para Festa',
                'slug'=>'artigos-para-festa'
            ],
            [
                'id'=>5,
                'category'=>'Áudio',
                'slug'=>'audio'
            ],
            [
                'id'=>6,
                'category'=>'Automotivo',
                'slug'=>'automotivo'
            ],
            [
                'id'=>7,
                'category'=>'Bebês',
                'slug'=>'bebes'
            ],
            [
                'id'=>8,
                'category'=>'Beleza &amp; Perfumaria',
                'slug'=>'beleza-&amp;-perfumaria'
            ],
            [
                'id'=>9,
                'category'=>'Bem-estar Sexual',
                'slug'=>'bem_estar-sexual'
            ],
            [
                'id'=>10,
                'category'=>'Brinquedos',
                'slug'=>'brinquedos'
            ],
            [
                'id'=>11,
                'category'=>'Cama, Mesa e Banho',
                'slug'=>'cama-mesa-e-banho'
            ],
            [
                'id'=>12,
                'category'=>'Câmeras e Drones',
                'slug'=>'cameras-e-drones'
            ],
            [
                'id'=>13,
                'category'=>'Casa e Construção',
                'slug'=>'casa-e-construcao'
            ],
            [
                'id'=>14,
                'category'=>'Casa Inteligente',
                'slug'=>'casa-inteligente'
            ],
            [
                'id'=>15,
                'category'=>'Celular e Smartphone',
                'slug'=>'celular-e-smartphone'
            ],
            [
                'id'=>16,
                'category'=>'Colchões',
                'slug'=>'colchoes'
            ],
            [
                'id'=>17,
                'category'=>'Comércio e Indústria',
                'slug'=>'comercio-e-industria'
            ],
            [
                'id'=>18,
                'category'=>'Cursos',
                'slug'=>'cursos'
            ],
            [
                'id'=>19,
                'category'=>'Decoração',
                'slug'=>'decoracao'
            ],
            [
                'id'=>20,
                'category'=>'Eletrodomésticos',
                'slug'=>'eletrodomesticos'
            ],
            [
                'id'=>21,
                'category'=>'Eletroportáteis',
                'slug'=>'eletroportateis'
            ],
            [
                'id'=>22,
                'category'=>'Esporte e Lazer',
                'slug'=>'esporte-e-lazer'
            ],
            [
                'id'=>23,
                'category'=>'Ferramentas',
                'slug'=>'ferramentas'
            ],
            [
                'id'=>24,
                'category'=>'Filmes e Séries',
                'slug'=>'filmes-e-series'
            ],
            [
                'id'=>25,
                'category'=>'Games',
                'slug'=>'games'
            ],
            [
                'id'=>26,
                'category'=>'Informática',
                'slug'=>'informatica'
            ],
            [
                'id'=>27,
                'category'=>'Instrumentos Musicais',
                'slug'=>'instrumentos-musicais'
            ],
            [
                'id'=>28,
                'category'=>'Livros',
                'slug'=>'livros'
            ],
            [
                'id'=>29,
                'category'=>'Mercado',
                'slug'=>'mercado'
            ],
            [
                'id'=>30,
                'category'=>'Moda',
                'slug'=>'moda'
            ],
            [
                'id'=>31,
                'category'=>'Móveis',
                'slug'=>'moveis'
            ],
            [
                'id'=>32,
                'category'=>'Música e Shows',
                'slug'=>'musica-e-shows'
            ],
            [
                'id'=>33,
                'category'=>'Natal',
                'slug'=>'natal'
            ],
            [
                'id'=>34,
                'category'=>'Papelaria',
                'slug'=>'papelaria'
            ],
            [
                'id'=>35,
                'category'=>'Pet Shop',
                'slug'=>'pet-shop'
            ],
            [
                'id'=>36,
                'category'=>'Relógios',
                'slug'=>'relogios'
            ],
            [
                'id'=>37,
                'category'=>'Saúde e Cuidados Pessoais',
                'slug'=>'saude-e-cuidados-pessoais'
            ],
            [
                'id'=>38,
                'category'=>'Serviços',
                'slug'=>'servicos'
            ],
            [
                'id'=>39,
                'category'=>'Suplementos Alimentares',
                'slug'=>'suplementos-alimentares'
            ],
            [
                'id'=>40,
                'category'=>'Tablets, iPads e E-Readers',
                'slug'=>'tablets-ipads-e-e_readers'
            ],
            [
                'id'=>41,
                'category'=>'Telefonia Fixa',
                'slug'=>'telefonia-fixa'
            ],
            [
                'id'=>42,
                'category'=>'TV e Vídeo',
                'slug'=>'tv-e-video'
            ],
            [
                'id'=>43,
                'category'=>'Utilidades Domésticas',
                'slug'=>'utilidades-domesticas'
            ],
            [
                'id'=>44,
                'category'=>'Black Friday',
                'slug'=>'black-friday'
            ],
        ];
        foreach ($dados as $dado){
            Category::create([
                'id'=>$dado['id'],
                'category'=>$dado['category'],
                'slug'=>$dado['slug']
            ]);
        }
    }
}
