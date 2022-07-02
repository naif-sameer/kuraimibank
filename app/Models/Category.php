<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

  protected $fillable = ['name'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'name'            => 'array',
  ];
}
