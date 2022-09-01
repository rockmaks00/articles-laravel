<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory;
    use NodeTrait;
    use HasSlug;

    public $timestamps = false;

    protected $fillable = ['name', 'image', 'description', 'parent_id'];

    public function articles() : BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
