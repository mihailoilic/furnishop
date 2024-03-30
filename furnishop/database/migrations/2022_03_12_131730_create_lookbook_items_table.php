<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLookbookItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lookbook_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("lookbook_id")->references("id")->on("lookbooks");
            $table->foreignId("product_id")->references("id")->on("products");
            $table->integer("position_x");
            $table->integer("position_y");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lookbook_items');
    }
}
