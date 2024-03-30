<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    private $products = [
        [
            "name"=>"Lugano Double Dresser",
            "description"=>"The design is completed with beveled edges. This fine detail ensures harmony and brings an elegance and exclusivity to the expression. Close the doors and/or drawers with ease. With a built in soft close mechanism, the furniture is protected and will stay beautiful over time.",
            "price"=>599,
            "collection_id"=>3
        ],
        [
            "name"=>"Lugano Nightstand",
            "description"=>"Looking sleek, elegant and exclusive, Lugano will solve all your storage needs without breaking a sweat. Keep your books, chargers and bedroom knick-knacks neatly hidden in this nifty little nightstand that will put the finishing touch on your bedroom décor.",
            "price"=>299,
            "collection_id"=>3
        ],
        [
            "name"=>"Bergamo sofa with round lounging unit",
            "description"=>"Bergamo by Morten Georgsen is organic luxury made comfortable. Bergamo elegantly combines extraordinary individual comfort with an elegant esthetic. The result is a contemporary sofa with all-day comfort.",
            "price"=>3499,
            "collection_id"=>1
        ],
        [
            "name"=>"Charlotte armchair",
            "description"=>"Feel the warm embrace of the Charlotte armchair. Charlotte’s comfort, durability, and beautiful design allow it to easily finds its place in any room.",
            "price"=>799,
            "collection_id"=>2
        ],
        [
            "name"=>"Madrid Coffee Table",
            "description"=>"Clean lines and organic shapes come together in a floating design to make the Madrid table a sensory, vibrant piece for your interior. ",
            "price"=>199,
            "collection_id"=>4
        ],
        [
            "name"=>"Silent Art Gallery",
            "description"=>"A great piece of art can help give a room extra personality. This is your chance to balance your design, infuse it with colour and add personal flair.",
            "price"=>299,
            "collection_id"=>null
        ],
        [
            "name"=>"Simple Rug",
            "description"=>"Front: 50% wool/50% tencel - Back: 70% cotton/30% fibre",
            "price"=>499,
            "collection_id"=>null
        ],
        [
            "name"=>"Rome Ourdoor Sofa 2 seater",
            "description"=>"Get a comfortable place to enjoy the open air and transform your terrace into a contemporary living space with Rome.",
            "price"=>1599,
            "collection_id"=>7
        ],
        [
            "name"=>"Rome Ourdoor Sofa",
            "description"=>"Get a comfortable place to enjoy the open air and transform your terrace into a contemporary living space with Rome",
            "price"=>899,
            "collection_id"=>7
        ],
        [
            "name"=>"Rome Coffee Table",
            "description"=>"Add an elegant centerpiece to your outdoor setting and keep food and drinks conveniently at hand.",
            "price"=>499,
            "collection_id"=>7
        ],
        [
            "name"=>"Sydney Trolley",
            "description"=>"Much more than just a place to put down a bottle, the Sydney trolley is a statement in your home.",
            "price"=>799,
            "collection_id"=>8
        ]

    ];
    public function run()
    {
        foreach($this->products as $product){
            Product::create($product);
        }
    }
}
