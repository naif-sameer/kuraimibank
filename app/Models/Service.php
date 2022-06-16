<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  use HasFactory;

  protected $fillable = ['image', 'name', 'description', 'other_advantage', 'service_conditions', 'category_id'];
}
