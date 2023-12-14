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
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bookid');
            $table->foreign('bookid')->references('id')->on('book');
            $table->unsignedBigInteger('userid');
            $table->foreign('userid')->references('id')->on('user_detail');
            $table->unsignedBigInteger('transactionid');
            $table->foreign('transactionid')->references('id')->on('transaction');
            $table->date('rentDate');
            $table->date('endDate');
            $table->date('returnDate')->nullable();
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
        Schema::dropIfExists('history');
    }
};
