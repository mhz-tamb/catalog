<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SluggableTrait;

class Product extends Model
{
    use HasFactory, SluggableTrait;

    public function sluggable(): string
    {
        return 'name';
    }
}
