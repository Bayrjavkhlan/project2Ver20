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
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_main_id');
            $table->foreign('book_main_id')->references('id')->on('book_main');
            $table->enum('status', ['available', 'rented', 'ordered'])->default('available');
            $table->enum('extend_status', ['requested', 'not requested', 'denied', 'accepted'])->default('not requested');
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
        Schema::dropIfExists('book');
    }
};
