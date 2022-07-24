<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
  use HasFactory, HasTranslations;

  public $translatable = [
    'title',
  ];

  protected $fillable = ['title', 'country_id', 'city_code', 'is_active'];

  public function country()
  {
    return $this->belongsTo(Country::class, 'country_id');
  }

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'title'            => 'array',
  ];
}
