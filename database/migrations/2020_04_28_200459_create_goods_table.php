<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('category_id');
            $table->string('name', 100);
            $table->text('description')->nullable()->default(NULL);
            $table->decimal('price', 10, 2);
            $table->decimal('old_price', 10, 2)->nullable()->default(NULL);;
            $table->string('hot_new_sale', 20)->nullable()->default(NULL);;
            $table->tinyInteger('active')->length(1)->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
