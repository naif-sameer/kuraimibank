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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('link');
            $table->string('icon');

            $table
                ->foreignId('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');


            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            $table
                ->foreignId('parent_category')
                ->nullable()
                ->references('id')
                ->on('sub_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categories');
    }
};
