<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product',function (Blueprint $table){
            $table->increments('id');
            $table->char('name',32);
            $table->char('description',64);
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')
                ->references('id')
                ->on('category')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
