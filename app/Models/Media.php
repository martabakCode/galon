<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Media extends Model
{
    use HasTranslatableSlug;
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'name', 'path', 'slug', 'description', 'size', 'type', 'item_id', 'enabled', 'sort',
    ];
    public $translatable = ['name', 'slug'];

    // public function getSlugOptions(): SlugOptions
    // {
    //     return SlugOptions::create()
    //         ->generateSlugsFrom('name')
    //         ->saveSlugsTo('slug');
    // }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::createWithLocales(['en', 'id'])
            ->generateSlugsFrom(function ($model, $locale) {
                return "{$model->name}";
            })
            ->saveSlugsTo('slug')
            ->usingLanguage(false);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
