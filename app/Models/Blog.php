<?php

namespace App\Models;

use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasTranslatableSlug;
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'title', 'slug', 'excerpt_en', 'excerpt_id', 'category_id', 'time_read', 'content_en', 'content_id', 'thumbnail', 'reads', 'enabled', 'sort'
    ];
    protected $casts = [
        'created_at' => "datetime:d M Y",
        'updated_at' => "datetime:d M Y",
    ];

    //public $stars;
    public $translatable = ['title', 'slug'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::createWithLocales(['en', 'id'])
            ->generateSlugsFrom(function ($model, $locale) {
                return "{$model->title}";
            })
            ->saveSlugsTo('slug')
            ->usingLanguage(false);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function image()
    { //return first image link
        $post = Blog::where('id', $this->id)->first();
        if ($post && !empty($post->thumbnail))
            return asset('storage/' . $post->thumbnail);
        else return asset('storage/no_image.png');
    }

    public function tags()
    {
        return $this->hasManyThrough(BlogTag::class, BlogPostTag::class,  'post_id', 'id', 'id', 'tag_id');
    }
}
