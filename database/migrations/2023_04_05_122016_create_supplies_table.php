<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id'); // номер бренда
            $table->string('client'); // заказчик (например: Евроопт)
            $table->string('location'); // место поставки (Гомельская область)
            $table->unsignedBigInteger('count'); // колличество литров
            $table->unsignedBigInteger('price'); // цена за все
            $table->unsignedBigInteger('month'); // месяц
            $table->unsignedBigInteger('year'); // день
            $table->timestamps();

            $table->index('brand_id', 'supply_brand_idx');
            $table->foreign('brand_id', 'supply_brand_fk')
                ->on('brands')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplies');
    }
}
