<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WebsiteInfo extends Model
{
  use HasFactory, HasTranslations;

  public $translatable = ['table_value'];

  protected $table = 'website_info';

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'table_value'   => 'array',
  ];

  /**
   * get is_active attribute as a boolean.
   */
  public function getIsActiveAttribute()
  {
    return (bool) $this->attributes['is_active'];
  }
}
