<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
  use HasFactory, HasTranslations;

  public $translatable = [
    'title',
  ];

  protected $fillable = ['title', 'country_code', 'is_active'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'title'            => 'array',
  ];
}
