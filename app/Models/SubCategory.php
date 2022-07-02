<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'link', 'icon', 'category_id', 'parent_category'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'name'                  => 'array',
  ];
}
