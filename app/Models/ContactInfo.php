<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
  use HasFactory;


  protected $fillable = ['key', 'value', 'is_active'];

  /**
   * get is_active attribute as a boolean.
   */
  public function getIsActiveAttribute()
  {
    return (bool) $this->attributes['is_active'];
  }
}
