<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class OurPartner extends Model
{
  use HasFactory, HasTranslations;

  public $translatable = [
    'title',
    'description',
    'bank_messaging_country'
  ];

  protected $fillable = ['title',  'description', 'bank_messaging_country', 'image',];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'title'                         => 'array',
    'description'                   => 'array',
    'bank_messaging_country'        => 'array',
  ];

  /**
   * get is_active attribute as a boolean.
   */
  public function getIsActiveAttribute()
  {
    return (bool) $this->attributes['is_active'];
  }
}
