<?php

namespace Database\Seeders;

use App\Models\SliderImage;
use Illuminate\Database\Seeder;

class SliderImageSeeder extends Seeder
{
    private $images = [
      [
          "image"=>"img1.jpg"
      ],
      [
          "image"=>"img2.jpg"
      ],
      [
          "image"=>"img3.jpg"
      ],
    ];
    public function run()
    {
        foreach($this->images as $image){
            SliderImage::create($image);
        }
    }
}
