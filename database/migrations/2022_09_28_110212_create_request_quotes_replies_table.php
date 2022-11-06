<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestQuotesRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_quotes_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_quotes_id');
            $table->foreign('request_quotes_id')->references('id')->on('request_quotes');
            $table->string('email');
            $table->longText('message');
            $table->string('created_by');
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
        Schema::dropIfExists('request_quotes_replies');
    }
}
