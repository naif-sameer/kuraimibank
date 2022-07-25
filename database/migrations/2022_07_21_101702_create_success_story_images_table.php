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
    Schema::create('success_story_images', function (Blueprint $table) {
      $table->id();

      $table->text('link');

      $table
        ->foreignId('success_story_id')
        ->references('id')
        ->on('success_stories')
        ->cascadeOnDelete();

      $table->boolean('is_active')->default(1);
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
    Schema::dropIfExists('success_story_images');
  }
};
