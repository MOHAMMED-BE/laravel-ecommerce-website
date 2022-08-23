<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCatagory extends Model
{
    use HasFactory;
    protected $fillable = [
        'catagory_id',
        'subcatagory_name_en',
        'subcatagory_name_ar',
        'subcatagory_slug_en',
        'subcatagory_slug_ar',
    ];
}
