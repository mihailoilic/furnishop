<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{


    private $images = [
        ["filename"=>"1640903.jpg", "thumbnail_filename"=>"1640903.jpg"],
        ["filename"=>"1640904.jpg", "thumbnail_filename"=>"1640904.jpg"],

        ["filename"=>"1640739.jpg", "thumbnail_filename"=>"1640739.jpg"],
        ["filename"=>"1640740.jpg", "thumbnail_filename"=>"1640740.jpg"],

        ["filename"=>"1682829.jpg", "thumbnail_filename"=>"1682829.jpg"],
        ["filename"=>"1682830.jpg", "thumbnail_filename"=>"1682830.jpg"],
        ["filename"=>"1682832.jpg", "thumbnail_filename"=>"1682832.jpg"],

        ["filename"=>"1096851.jpg", "thumbnail_filename"=>"1096851.jpg"],
        ["filename"=>"1096849.jpg", "thumbnail_filename"=>"1096849.jpg"],
        ["filename"=>"1096855.jpg", "thumbnail_filename"=>"1096855.jpg"],

        ["filename"=>"856671.jpg", "thumbnail_filename"=>"856671.jpg"],

        ["filename"=>"1588087.jpg", "thumbnail_filename"=>"1588087.jpg"],

        ["filename"=>"1711612.jpg", "thumbnail_filename"=>"1711612.jpg"],
        ["filename"=>"1106858.jpg", "thumbnail_filename"=>"1106858.jpg"],

        ["filename"=>"563155.jpg", "thumbnail_filename"=>"563155.jpg"],
        ["filename"=>"563157.jpg", "thumbnail_filename"=>"563157.jpg"],
        ["filename"=>"802248.jpg", "thumbnail_filename"=>"802248.jpg"],

        ["filename"=>"563132.jpg", "thumbnail_filename"=>"563132.jpg"],
        ["filename"=>"563131.jpg", "thumbnail_filename"=>"563131.jpg"],

        ["filename"=>"563119.jpg", "thumbnail_filename"=>"563119.jpg"],
        ["filename"=>"563120.jpg", "thumbnail_filename"=>"563120.jpg"],

        ["filename"=>"660512.jpg", "thumbnail_filename"=>"660512.jpg"],
        ["filename"=>"660514.jpg", "thumbnail_filename"=>"660514.jpg"],



    ];


    public function run()
    {
        foreach($this->images as $image){
            Image::create($image);
        }
    }
}
