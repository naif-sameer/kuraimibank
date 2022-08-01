<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
  use HasFactory, HasTranslations;

  public $translatable = [
    'title',
    'sub_title',
    'description'
  ];

  protected $fillable = ['table_key', 'title', 'sub_title', 'description', 'is_active'];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'title'              => 'array',
    'sub_title'          => 'array',
    'description'        => 'array',
  ];

  /**
   * get is_active attribute as a boolean.
   */
  public function getIsActiveAttribute()
  {
    return (bool) $this->attributes['is_active'];
  }
}
