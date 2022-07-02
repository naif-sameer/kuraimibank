<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'country_code', 'is_active'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'name'            => 'array',
  ];
}
