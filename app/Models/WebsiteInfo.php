<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteInfo extends Model
{
  use HasFactory;

  protected $table = 'website_info';

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'table_value'   => 'array',
  ];
}
