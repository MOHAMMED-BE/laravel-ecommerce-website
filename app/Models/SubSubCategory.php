<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'subsubcategory_name_en',
        'subsubcategory_name_ar',
        'subsubcategory_slug_en',
        'subsubcategory_slug_ar',
    ];

    public function getCategory(){
        return ( $this->belongsTo(Category::class,'category_id','id'));
    }

    public function getSubCategory(){
        return ( $this->belongsTo(SubCategory::class,'subcategory_id','id'));
    }
}
