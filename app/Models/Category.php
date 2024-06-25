<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslatableSlug;
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'name', 'parent_id', 'slug', 'description_en', 'description_id', 'enabled', 'sort',
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
    // protected function generateNonUniqueSlug(): string
    // {
    //     $slugField = $this->slugOptions->slugField;

    //     if ($this->hasCustomSlugBeenUsed() && !empty($this->$slugField)) {
    //         return $this->$slugField;
    //     }
    //     $txt = strtolower(trim($this->getSlugSourceString()));
    //     $txt = preg_replace('|[^a-z-A-Z\p{Indonesia}0-9 _]|iu', '', $txt);
    //     $txt = preg_replace('/\s+/', ' ', $txt);
    //     return str_replace(' ', $this->slugOptions->slugSeparator, $txt);
    // }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sub_categories()
    {
        return Category::where('parent_id', $this->id)->orderBy('sort')->get();
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function media()
    {
        return Media::where('type', 'Category')->where('item_id', $this->id)->first();
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
