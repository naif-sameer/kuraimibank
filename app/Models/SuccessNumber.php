<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SuccessNumber extends Model
{
  use HasFactory, HasTranslations;

  public $translatable = [
    'description',
  ];

  protected $fillable = [
    'title',
    'description',
    'is_active'
  ];

  /**
   * get is_active attribute as a boolean.
   */
  public function getIsActiveAttribute()
  {
    return (bool) $this->attributes['is_active'];
  }
}
