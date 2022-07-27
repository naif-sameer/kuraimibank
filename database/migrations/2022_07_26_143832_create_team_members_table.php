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
    Schema::create('team_members', function (Blueprint $table) {
      $table->id();

      $table->text('name');
      $table->text('image');
      $table->json('role');

      $table
        ->foreignId('team_role_id')
        ->references('id')
        ->on('team_roles')
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
    Schema::dropIfExists('team_members');
  }
};
