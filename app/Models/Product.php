<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug','description', 'price', 'status'];
    protected $casts = [ 'status' => 'boolean' ];

    protected static function booted()
    { 
        static::saving(function($product) {
            $slug = Str::slug($product->name, '-');
            $product->slug = Product::where('slug', $slug)->exists() ? ($slug . uniqid()) : $slug;
        }); 
    }
}
