<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Idegen kulcs a categories.id-ra: csak létező kategória adható meg,
            // és kategória törlésekor a hozzá tartozó termékek is törlődnek
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            
            $table->string('name');
            $table->integer('price'); // Alapár
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->json('options')->nullable(); // Méretek, feltétek, extrák JSON formátumban
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
        Schema::dropIfExists('products');
    }
}
