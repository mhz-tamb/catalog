<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Support\Str;

/**
 * Trait: SluggableTrait
 * @package App\Traits
 */
trait SluggableTrait
{
    /**
     * Config field of source for slug
     * @return string
     */
    abstract public function sluggable(): string;

    /**
     * Generate slug if it's empty
     * @return void
     */
    static protected function bootSluggableTrait(): void
    {
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $source = $model->getAttribute($model->sluggable());
                $model->slug = $model->makeSlug($source);
            }
        });
    }

    /**
     * makeSlug
     * @param string $str
     * @return string
     */
    public function makeSlug(string $str): string
    {
        return Str::slug($str, '-');
    }
}
