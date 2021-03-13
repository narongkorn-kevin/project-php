<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transection', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned(); //เชื่อม Foreign
            $table->foreign('product_id')->references('id')->on('product');//เชื่อม Foreign
            $table->bigInteger('name_id')->unsigned();
            $table->foreign('name_id')->references('id')->on('users');
            $table->integer('qty');
            $table->string('remark')->nullable();
            $table->date('date');

            $table->enum('status',['up','down']);


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
        Schema::dropIfExists('transection');
    }
}
