<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class SeederProducts extends Seeder
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
                'name'=>'labore',
                'description'=>'Earum voluptatem ipsa recusandae blanditiis explicabo quo et. Nemo ipsum est ratione ea. Ducimus omnis et est fugit voluptas. Et nobis qui perferendis perferendis autem cum.',
                'value'=>1395,
                'available'=>true,
                'payment_method'=>'Paypal',
                'sold_quantity'=>759,
                'image'=>'https://lorempixel.com/680/540/cats/?78307',
                'created_at'=>'2020-06-26T20:44:19',
                'updated_at'=>'2020-06-26T20:44:19',
                'category_id'=>2,
                'ranking_id'=>1
            ],
            [
                'id'=>2,
                'name'=>'magnam',
                'description'=>'Aut consequatur velit sapiente enim occaecati reprehenderit. Ex minima consectetur laboriosam sunt explicabo et atque. Sed eius quod placeat ab magnam. Unde autem aperiam sint omnis autem.',
                'value'=>2404,
                'available'=>true,
                'payment_method'=>'Credit Card',
                'sold_quantity'=>7,
                'image'=>'https://lorempixel.com/680/540/cats/?36988',
                'created_at'=>'2020-06-26T20:44:20',
                'updated_at'=>'2020-06-26T20:44:20',
                'category_id'=>14,
                'ranking_id'=>1
            ],
            [
                'id'=>3,
                'name'=>'laudantium',
                'description'=>'Ullam maiores nihil at magni. Et illum aspernatur enim aut consequuntur atque et. Distinctio ut et consequatur eum et et.',
                'value'=>2796,
                'available'=>true,
                'payment_method'=>'Paypal',
                'sold_quantity'=>564,
                'image'=>'https://lorempixel.com/680/540/cats/?86822',
                'created_at'=>'2020-06-26T20:44:20',
                'updated_at'=>'2020-06-26T20:44:20',
                'category_id'=>2,
                'ranking_id'=>1
            ],
            [
                'id'=>4,
                'name'=>'non',
                'description'=>'Odit aut ad omnis. Aut voluptatem id enim maiores eligendi velit quam. A cupiditate aut rem voluptas dolorem asperiores. Atque autem accusantium et eum.',
                'value'=>2358,
                'available'=>true,
                'payment_method'=>'Cash',
                'sold_quantity'=>386,
                'image'=>'https://lorempixel.com/680/540/cats/?28234',
                'created_at'=>'2020-06-26T20:44:21',
                'updated_at'=>'2020-06-26T20:44:21',
                'category_id'=>8,
                'ranking_id'=>1
            ],
            [
                'id'=>5,
                'name'=>'quasi',
                'description'=>'Exercitationem vel deserunt veniam quia. Quam neque error omnis maxime temporibus. Eligendi dolorem tempore distinctio et error occaecati non perferendis.',
                'value'=>1403,
                'available'=>false,
                'payment_method'=>'Paypal',
                'sold_quantity'=>691,
                'image'=>'https://lorempixel.com/680/540/cats/?65396',
                'created_at'=>'2020-06-26T20:44:21',
                'updated_at'=>'2020-06-26T20:44:21',
                'category_id'=>24,
                'ranking_id'=>1
            ],
            [
                'id'=>6,
                'name'=>'perferendis',
                'description'=>'Cum in earum ut harum voluptas. Impedit rem aut harum dolorem nihil numquam nemo quaerat. Molestiae ipsa est eos qui aliquid totam. Quia incidunt placeat dignissimos similique.',
                'value'=>1049,
                'available'=>true,
                'payment_method'=>'Paypal',
                'sold_quantity'=>502,
                'image'=>'https://lorempixel.com/680/540/cats/?36766',
                'created_at'=>'2020-06-26T20:44:22',
                'updated_at'=>'2020-06-26T20:44:22',
                'category_id'=>15,
                'ranking_id'=>1
            ],
            [
                'id'=>7,
                'name'=>'aliquam',
                'description'=>'Rem magni optio inventore quod. Maiores et velit impedit labore totam nulla. Et nulla similique facilis voluptatum. Vero saepe beatae sapiente repudiandae quia ullam.',
                'value'=>818,
                'available'=>true,
                'payment_method'=>'Paypal',
                'sold_quantity'=>419,
                'image'=>'https://lorempixel.com/680/540/cats/?11605',
                'created_at'=>'2020-06-26T20:44:22',
                'updated_at'=>'2020-06-26T20:44:22',
                'category_id'=>28,
                'ranking_id'=>1
            ],
            [
                'id'=>8,
                'name'=>'similique',
                'description'=>'Voluptate eum enim illo atque pariatur consequatur aliquam. Impedit qui sequi aperiam culpa. Sit aliquam aut esse architecto deserunt deserunt. Omnis sit quia et non suscipit nobis id.',
                'value'=>1281,
                'available'=>true,
                'payment_method'=>'Cash',
                'sold_quantity'=>360,
                'image'=>'https://lorempixel.com/680/540/cats/?44006',
                'created_at'=>'2020-06-26T20:44:23',
                'updated_at'=>'2020-06-26T20:44:23',
                'category_id'=>21,
                'ranking_id'=>1
            ],
            [
                'id'=>9,
                'name'=>'laboriosam',
                'description'=>'Quia et commodi saepe est ea placeat quas omnis. Dolor et sed eveniet. Corporis rerum maxime occaecati quo numquam. Illo repudiandae amet qui. Pariatur autem qui quam quia.',
                'value'=>1931,
                'available'=>true,
                'payment_method'=>'Cash',
                'sold_quantity'=>543,
                'image'=>'https://lorempixel.com/680/540/cats/?90050',
                'created_at'=>'2020-06-26T20:44:23',
                'updated_at'=>'2020-06-26T20:44:23',
                'category_id'=>34,
                'ranking_id'=>1
            ],
            [
                'id'=>10,
                'name'=>'neque',
                'description'=>'Aut minima repellendus facilis cupiditate aliquam aliquam. Ipsam doloribus qui perspiciatis veniam non et. Ipsa ducimus maxime nam totam sit quia quia. Perferendis saepe non dolor quas.',
                'value'=>2887,
                'available'=>false,
                'payment_method'=>'Paypal',
                'sold_quantity'=>164,
                'image'=>'https://lorempixel.com/680/540/cats/?86303',
                'created_at'=>'2020-06-26T20:44:24',
                'updated_at'=>'2020-06-26T20:44:24',
                'category_id'=>16,
                'ranking_id'=>1
            ],
            [
                'id'=>11,
                'name'=>'culpa',
                'description'=>'Cum ut aut officia et. Asperiores voluptates repellat voluptates neque quibusdam. Dolor inventore porro ipsa voluptatem autem repellendus porro pariatur.',
                'value'=>122,
                'available'=>false,
                'payment_method'=>'Paypal',
                'sold_quantity'=>688,
                'image'=>'https://lorempixel.com/680/540/cats/?23759',
                'created_at'=>'2020-06-26T20:44:24',
                'updated_at'=>'2020-06-26T20:44:24',
                'category_id'=>20,
                'ranking_id'=>1
            ],
            [
                'id'=>12,
                'name'=>'molestias',
                'description'=>'Quidem aliquam temporibus quidem et et. Iusto veniam aspernatur repellat veritatis incidunt veniam. Qui quasi rerum aut sint labore et repellendus dignissimos.',
                'value'=>1907,
                'available'=>true,
                'payment_method'=>'Credit Card',
                'sold_quantity'=>371,
                'image'=>'https://lorempixel.com/680/540/cats/?43523',
                'created_at'=>'2020-06-26T20:44:24',
                'updated_at'=>'2020-06-26T20:44:24',
                'category_id'=>23,
                'ranking_id'=>1
            ],
            [
                'id'=>13,
                'name'=>'est',
                'description'=>'Tempora et sunt eos fuga ut autem. Et iusto quis culpa. Itaque quo voluptatum est.',
                'value'=>154,
                'available'=>true,
                'payment_method'=>'Paypal',
                'sold_quantity'=>354,
                'image'=>'https://lorempixel.com/680/540/cats/?86279',
                'created_at'=>'2020-06-26T20:44:25',
                'updated_at'=>'2020-06-26T20:44:25',
                'category_id'=>12,
                'ranking_id'=>1
            ],
            [
                'id'=>14,
                'name'=>'non',
                'description'=>'Quae hic ad facere iusto sunt non. Eos quis consequatur recusandae rerum alias non aut. Illo nobis unde ipsa quia asperiores minus. Sed omnis quae beatae. Delectus accusantium qui dicta cumque.',
                'value'=>247,
                'available'=>true,
                'payment_method'=>'Cash',
                'sold_quantity'=>282,
                'image'=>'https://lorempixel.com/680/540/cats/?20495',
                'created_at'=>'2020-06-26T20:44:25',
                'updated_at'=>'2020-06-26T20:44:25',
                'category_id'=>6,
                'ranking_id'=>1
            ],
            [
                'id'=>15,
                'name'=>'amet',
                'description'=>'Temporibus architecto eos laudantium deleniti vero inventore expedita. Nihil quas praesentium harum ut labore dolorum dolorum. Itaque earum fugit nihil dolorem expedita doloribus rerum.',
                'value'=>1307,
                'available'=>false,
                'payment_method'=>'Paypal',
                'sold_quantity'=>121,
                'image'=>'https://lorempixel.com/680/540/cats/?28468',
                'created_at'=>'2020-06-26T20:44:26',
                'updated_at'=>'2020-06-26T20:44:26',
                'category_id'=>35,
                'ranking_id'=>1
            ],
            [
                'id'=>16,
                'name'=>'repellat',
                'description'=>'Modi aut voluptates et. Dicta et accusamus velit dicta. Non dolor sit sed consequatur voluptatem aspernatur. Qui dolor quis in nobis quia recusandae quo. Beatae eum et laudantium praesentium.',
                'value'=>1737,
                'available'=>true,
                'payment_method'=>'Cash',
                'sold_quantity'=>816,
                'image'=>'https://lorempixel.com/680/540/cats/?54624',
                'created_at'=>'2020-06-26T20:44:26',
                'updated_at'=>'2020-06-26T20:44:26',
                'category_id'=>33,
                'ranking_id'=>1
            ],
            [
                'id'=>17,
                'name'=>'voluptatem',
                'description'=>'Sint quod neque modi natus aspernatur sit dolorum. Deserunt earum quod autem assumenda inventore facilis ducimus voluptatem. Sapiente eum aut optio voluptatem earum. Sed aspernatur mollitia non est.',
                'value'=>1587,
                'available'=>true,
                'payment_method'=>'Paypal',
                'sold_quantity'=>879,
                'image'=>'https://lorempixel.com/680/540/cats/?71278',
                'created_at'=>'2020-06-26T20:44:27',
                'updated_at'=>'2020-06-26T20:44:27',
                'category_id'=>23,
                'ranking_id'=>1
            ],
            [
                'id'=>18,
                'name'=>'et',
                'description'=>'Autem aut minima libero sunt. Voluptas quam modi dolorum asperiores unde accusamus. Provident est dignissimos qui nostrum. Culpa ullam omnis laboriosam esse.',
                'value'=>2868,
                'available'=>false,
                'payment_method'=>'Credit Card',
                'sold_quantity'=>290,
                'image'=>'https://lorempixel.com/680/540/cats/?81302',
                'created_at'=>'2020-06-26T20:44:27',
                'updated_at'=>'2020-06-26T20:44:27',
                'category_id'=>42,
                'ranking_id'=>1
            ],
            [
                'id'=>19,
                'name'=>'sed',
                'description'=>'Placeat ut et et dolorem doloribus. Et enim facere velit ullam. Amet laudantium ullam ut illo in. Ad ut qui et molestiae est et. Voluptates dolor numquam quia beatae quidem repellat.',
                'value'=>645,
                'available'=>false,
                'payment_method'=>'Cash',
                'sold_quantity'=>694,
                'image'=>'https://lorempixel.com/680/540/cats/?96522',
                'created_at'=>'2020-06-26T20:44:28',
                'updated_at'=>'2020-06-26T20:44:28',
                'category_id'=>30,
                'ranking_id'=>1
            ],
            [
                'id'=>20,
                'name'=>'quia',
                'description'=>'Assumenda sint et enim voluptatem ad placeat voluptates. Doloremque nihil qui libero voluptatem qui quia esse. At harum ipsum quas eos dignissimos.',
                'value'=>2557,
                'available'=>true,
                'payment_method'=>'Cash',
                'sold_quantity'=>300,
                'image'=>'https://lorempixel.com/680/540/cats/?71501',
                'created_at'=>'2020-06-26T20:44:28',
                'updated_at'=>'2020-06-26T20:44:28',
                'category_id'=>43,
                'ranking_id'=>1
            ],
            [
                'id'=>21,
                'name'=>'quia',
                'description'=>'Et vero incidunt laborum similique ad quia molestiae. Velit voluptas eveniet libero illo omnis minus temporibus natus.',
                'value'=>481,
                'available'=>false,
                'payment_method'=>'Cash',
                'sold_quantity'=>39,
                'image'=>'https://lorempixel.com/680/540/cats/?81336',
                'created_at'=>'2020-06-26T20:44:29',
                'updated_at'=>'2020-06-26T20:44:29',
                'category_id'=>34,
                'ranking_id'=>1
            ],
            [
                'id'=>22,
                'name'=>'iste',
                'description'=>'Ut labore vel qui perferendis ea quia qui. Libero non ipsam nemo aut. Deleniti enim ex quia totam dolores rem saepe tenetur. Omnis cum non et.',
                'value'=>205,
                'available'=>false,
                'payment_method'=>'Cash',
                'sold_quantity'=>238,
                'image'=>'https://lorempixel.com/680/540/cats/?82450',
                'created_at'=>'2020-06-26T20:44:29',
                'updated_at'=>'2020-06-26T20:44:29',
                'category_id'=>20,
                'ranking_id'=>1
            ],
            [
                'id'=>23,
                'name'=>'quibusdam',
                'description'=>'Quidem et voluptatibus nesciunt consequatur ut minus et. Culpa sit sit ut doloremque saepe. Velit occaecati impedit sed illo.',
                'value'=>820,
                'available'=>false,
                'payment_method'=>'Paypal',
                'sold_quantity'=>176,
                'image'=>'https://lorempixel.com/680/540/cats/?89545',
                'created_at'=>'2020-06-26T20:44:30',
                'updated_at'=>'2020-06-26T20:44:30',
                'category_id'=>11,
                'ranking_id'=>1
            ],
            [
                'id'=>24,
                'name'=>'aspernatur',
                'description'=>'Qui voluptatum sit nulla magni asperiores laboriosam. Culpa ut vel totam consequuntur suscipit. Quibusdam iste consequatur quod aliquam.',
                'value'=>613,
                'available'=>true,
                'payment_method'=>'Paypal',
                'sold_quantity'=>23,
                'image'=>'https://lorempixel.com/680/540/cats/?46319',
                'created_at'=>'2020-06-26T20:44:30',
                'updated_at'=>'2020-06-26T20:44:30',
                'category_id'=>13,
                'ranking_id'=>1
            ],
            [
                'id'=>25,
                'name'=>'harum',
                'description'=>'Aliquam velit aliquid qui dolorem. Dolore maxime nihil commodi inventore sed earum esse. Voluptatem corporis harum vitae et. Qui labore autem eaque officia atque.',
                'value'=>776,
                'available'=>true,
                'payment_method'=>'Paypal',
                'sold_quantity'=>447,
                'image'=>'https://lorempixel.com/680/540/cats/?86083',
                'created_at'=>'2020-06-26T20:44:31',
                'updated_at'=>'2020-06-26T20:44:31',
                'category_id'=>8,
                'ranking_id'=>1
            ],
            [
                'id'=>26,
                'name'=>'sit',
                'description'=>'Nisi repudiandae praesentium placeat nulla libero velit. A aspernatur autem repellendus saepe. Doloribus aperiam eveniet expedita veritatis ea.',
                'value'=>2052,
                'available'=>false,
                'payment_method'=>'Credit Card',
                'sold_quantity'=>798,
                'image'=>'https://lorempixel.com/680/540/cats/?33223',
                'created_at'=>'2020-06-26T20:44:31',
                'updated_at'=>'2020-06-26T20:44:31',
                'category_id'=>21,
                'ranking_id'=>1
            ],
            [
                'id'=>27,
                'name'=>'reprehenderit',
                'description'=>'Accusamus laboriosam optio aut dolores earum est. Consectetur provident quam non repellat voluptas. Eligendi optio nobis est vel tenetur.',
                'value'=>256,
                'available'=>true,
                'payment_method'=>'Credit Card',
                'sold_quantity'=>762,
                'image'=>'https://lorempixel.com/680/540/cats/?22948',
                'created_at'=>'2020-06-26T20:44:31',
                'updated_at'=>'2020-06-26T20:44:31',
                'category_id'=>43,
                'ranking_id'=>1
            ],
            [
                'id'=>28,
                'name'=>'quo',
                'description'=>'Molestiae rerum sit explicabo modi eum nostrum modi. Quidem quibusdam eum dicta sint aut id eum.',
                'value'=>1556,
                'available'=>false,
                'payment_method'=>'Credit Card',
                'sold_quantity'=>261,
                'image'=>'https://lorempixel.com/680/540/cats/?92893',
                'created_at'=>'2020-06-26T20:44:32',
                'updated_at'=>'2020-06-26T20:44:32',
                'category_id'=>43,
                'ranking_id'=>1
            ],
            [
                'id'=>29,
                'name'=>'voluptates',
                'description'=>'Voluptatibus aut quia nihil nam suscipit. Nulla reiciendis ex numquam sed sit.',
                'value'=>993,
                'available'=>false,
                'payment_method'=>'Paypal',
                'sold_quantity'=>815,
                'image'=>'https://lorempixel.com/680/540/cats/?71484',
                'created_at'=>'2020-06-26T20:44:32',
                'updated_at'=>'2020-06-26T20:44:32',
                'category_id'=>29,
                'ranking_id'=>1
            ],
            [
                'id'=>30,
                'name'=>'dolorem',
                'description'=>'Quia labore est illo magni natus quod. Sit quam reprehenderit sed voluptatum aut eaque officia.',
                'value'=>1974,
                'available'=>false,
                'payment_method'=>'Cash',
                'sold_quantity'=>161,
                'image'=>'https://lorempixel.com/680/540/cats/?32919',
                'created_at'=>'2020-06-26T20:44:33',
                'updated_at'=>'2020-06-26T20:44:33',
                'category_id'=>39,
                'ranking_id'=>1
            ],
        ];

        foreach ($dados as $dado){
            Product::create([
                'id'=>$dado['id'],
                'name'=>$dado['name'],
                'description'=>$dado['description'],
                'value'=>$dado['value'],
                'available'=>$dado['available'],
                'payment_method'=>$dado['payment_method'],
                'sold_quantity'=>$dado['sold_quantity'],
                'image'=>$dado['image'],
                'created_at'=>$dado['created_at'],
                'updated_at'=>$dado['updated_at'],
                'category_id'=>$dado['category_id'],
                'ranking_id'=>$dado['ranking_id'],
            ]);
        }
    }
}