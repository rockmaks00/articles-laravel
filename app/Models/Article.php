<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Article extends Model
{
    use HasFactory;
    use HasSlug;
    use Searchable;

    protected $fillable = ['name', 'image', 'preview', 'text', 'author_id'];

    public function author() : BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
