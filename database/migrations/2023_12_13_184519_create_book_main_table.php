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
        Schema::create('book_main', function (Blueprint $table) {
            $table->id();
            $table->string('isbn', 13);
            $table->string('title', 255);
            $table->string('author', 255);
            $table->text('description');
            $table->string('type', 255);
            $table->integer('total_quantity');
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
        Schema::dropIfExists('book_main');
    }
};
