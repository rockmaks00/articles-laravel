<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Author extends Model
{
    use HasFactory;
    use HasSlug;

    public $timestamps = false;

    protected $fillable = ['first_name', 'last_name', 'patronymic', 'avatar', 'birth_date', 'biography'];

    public function articles() : HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['first_name', 'last_name', 'patronymic'])
            ->saveSlugsTo('slug');
    }
}
