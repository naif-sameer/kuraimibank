<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ServicePoint extends Model
{
  use HasFactory, HasTranslations;

  public $translatable = [
    'title',
    'address',
    'working_hours'
  ];

  protected $fillable = ['title', 'address', 'working_hours', 'phone', 'second_phone', 'city_id', 'is_active'];

  public function city()
  {
    return $this->belongsTo(City::class, 'city_id');;
  }

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'title'           => 'array',
    'address'         => 'array',
    'working_hours'   => 'array',
  ];

  /**
   * get is_active attribute as a boolean.
   */
  public function getIsActiveAttribute()
  {
    return (bool) $this->attributes['is_active'];
  }
}
