<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->date('expiryDate');
            $table->date('bestBeforeDate');
            $table->integer('quantity');
            $table->float('weight');
            $table->unsignedBigInteger('listItemId');
            $table->unsignedBigInteger('categoryId');
            $table->timestamps();

            $table->foreign('listItemId')->references('id')->on('item_lists')->onDelete('cascade');
            $table->foreign('categoryId')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
