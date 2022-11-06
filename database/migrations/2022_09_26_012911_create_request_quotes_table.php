<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_quotes', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('phone');
            $table->string('product_name');
            $table->longText('product_link')->nullable();
            $table->bigInteger('quantity');
            $table->double('shipping_with_cost')->nullable();
            $table->double('shipping_without_cost')->nullable();
            $table->string('read_status')->default('Unread');
            $table->string('reply_status')->default('Active');
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
        Schema::dropIfExists('request_quotes');
    }
}
