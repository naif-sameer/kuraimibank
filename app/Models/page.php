<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class page extends Model
{
  use HasFactory;

  protected $fillable = ['table_key', 'title', 'sub_title', 'description'];

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
}
