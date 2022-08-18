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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('book')->nullable(true);
            $table->unsignedBigInteger('story')->nullable(true);
            $table->integer('rating');
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('book')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('story')->references('id')->on('stories')->onDelete('cascade');
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
        Schema::dropIfExists('feedback');
    }
};
