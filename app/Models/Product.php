<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Like;
use App\Models\CartItem;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

    protected $fillable = [
        'name', 
        'price', 
        'description', 
        'image', 
        'stock',
        'category_id'
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

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'likes');
    }
    // public function items()
    // {
    //     return $this->hasMany(CartItem::class);
    // }
}
