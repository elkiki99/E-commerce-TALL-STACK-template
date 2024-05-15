<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag',
        'description'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'tag_product');
    }
}
