<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopBasic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products',function (Blueprint $table){
           $table->increments('id');
           $table->string('title');
           $table->string('alias');
           $table->decimal('price',10,2);
           $table->text('description');
           $table->timestamps();
        });

        Schema::create('orders',function (Blueprint $table){
            $table->increments('id');
            $table->string('customer_name');
            $table->string('email');
            $table->string('phone');
            $table->decimal('total_price',10,2);
            $table->text('feedback');
            $table->timestamps();
        });

        Schema::create('pages',function (Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('alias');
            $table->text('content');
            $table->timestamps();
        });

        Schema::create('order_product',function (Blueprint $table){
            $table->integer('order_id');
            $table->integer('product_id');
            $table->primary(['order_id','product_id']);
            $table->integer('amount');
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
        Schema::dropIfExists('orders');
        Schema::dropIfExists('pages');
;    }
}
