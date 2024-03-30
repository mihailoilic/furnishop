<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Product extends Component
{
    public $id;
    public $name;
    public $price;
    public $img1;
    public $img2;
    public $class;

    public function __construct($product, $class="")
    {
        $this->id = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->img1 = $product->images->get(0)->thumbnail_filename;
        $this->img2 = $product->images->has(1) ?
            $product->images->get(1)->thumbnail_filename
            : $this->img1;
        $this->class = $class;

    }


    public function render()
    {
        return view('components.product');
    }
}
