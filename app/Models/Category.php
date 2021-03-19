<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SluggableTrait;
use App\Models\Product;

class Category extends Model
{
    use HasFactory, SluggableTrait;

    protected $fillable = ['parent_id', 'name', 'slug'];

    public function products()
    {
        return $this->belongsToMany(static::class, 'products_categories', 'category_id', 'product_id');
    }

    public function sluggable(): string
    {
        return 'name';
    }
}
