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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('code', 5);
            $table->string('name');
            $table->string('description')->nullable();
            $table->enum('type', ['Tablet', 'Kapsul', 'Sirup', 'Salep']);
            $table->date('expired_date');
            $table->integer('stock');
            $table->integer('selling_price');

            $table->unsignedBigInteger('medicine_category_id');
            $table->foreign('medicine_category_id')->references('id')->on('medicine_categories')->onDelete('cascade');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
