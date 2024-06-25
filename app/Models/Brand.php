<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Brand extends Model
{
    use HasTranslatableSlug;
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'name', 'slug', 'description_id', 'description_en', 'enabled', 'sort',
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

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function media()
    {
        return Media::where('type', 'Brand')->where('item_id', $this->id)->first();
    }

    public function image()
    {
        $image = $this->media();
        if ($image && isset($image->path)) {
            return asset('storage/' . $image->path);
        } else {
            return asset('storage/no_image.png');
        }

    }
}
