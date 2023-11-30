<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book_publisher', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('book_id')->unsigned();
            $table->unsignedBiginteger('publisher_id')->unsigned();

            $table->foreign('book_id')->references('id')
                ->on('books')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')
                ->on('publishers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_publisher');
    }
};
