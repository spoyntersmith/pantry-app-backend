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
            $table->date('expiryDate')->nullable();
            $table->date('bestBeforeDate')->nullable();
            $table->integer('quantity')->default(1);
            $table->float('weight')->default(0.0);
            $table->unsignedBigInteger('item_list_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('item_list_id')->references('id')->on('item_lists')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories');
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
