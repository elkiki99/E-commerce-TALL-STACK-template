<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

    protected $fillable = [
        'name', 
        'price', 
        'description', 
        'image_name', 
        'stock',
        'category_id',
        'tags_id'
    ];
    
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_product');
    }
}
