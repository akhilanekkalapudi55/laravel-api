<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    protected $fillable = [
        'category_id',
        'classification_code',
        'classification_name',
        'classification_desc',
   ];
}
