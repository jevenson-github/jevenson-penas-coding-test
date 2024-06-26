<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('product_name'); 
            $table->text('product_description'); 
            $table->decimal('product_price', 8,2); // CREATES NUMERIC IN TYPE AND ACCEPTS UPTO TWO(2) DECIMAL PLACES 
            $table->timestamps(); // CREATES AN 'created_at' AND 'updated_at' TIMESTAMP COLUMN . 

            // INDEX COLUMNS 
            $table->index(['product_name','product_price']); 
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
};
