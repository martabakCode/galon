<?php

namespace App\Models;

use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogKeyword extends Model
{
    use HasFactory;
    use HasTranslatableSlug;
    use HasTranslations;

    protected $fillable = [
        'name',
        'slug'
    ];
    public $translatable = ['name', 'slug'];

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
