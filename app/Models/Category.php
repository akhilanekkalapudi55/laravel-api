<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable = [
        'show_to_customer',
        'category_code',
        'category_name',
        'category_desc'
   ];
}
