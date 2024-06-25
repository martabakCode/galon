<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslatableSlug;
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'name', 'slug', 'excerpt', 'category_id', 'brand_id', 'stock', 'price', 'buy_price', 'description', 'enabled', 'sort',
    ];

    //public $stars;
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function media()
    { //return all product images
        return Media::where('type', 'Product')->where('item_id', $this->id)->get();
    }

    public function image()
    { //return first image link
        $image = Media::where('type', 'Product')->where('item_id', $this->id)->first();
        if ($image && isset($image->path)) {
            return asset('storage/' . $image->path);
        } else {
            return asset('storage/no_image.png');
        }

    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function stars()
    {
        $stars = 0;
        $loop = 0;
        $per = ['5' => 0, '4' => 0, '3' => 0, '2' => 0, '1' => 0];
        foreach ($this->reviews as $review) {
            $stars = $stars + $review->stars;
            $loop = $loop + 1;
            if ($review->stars == 5) {
                $per['5'] = $per['5'] + 1;
            } elseif ($review->stars == 4) {
                $per['4'] = $per['4'] + 1;
            } elseif ($review->stars == 3) {
                $per['3'] = $per['3'] + 1;
            } elseif ($review->stars == 2) {
                $per['2'] = $per['2'] + 1;
            } elseif ($review->stars == 1) {
                $per['1'] = $per['1'] + 1;
            }

        }
        foreach ($per as $k => $p) {
            if ($loop) {
                $per[$k] = $p / $loop * 100;
            } else {
                $per[$k] = 0;
            }

        }

        $data = [
            'total' => $stars,
            'value' => $loop > 0 ? ($stars / $loop) : 0,
            'stars' => $loop > 0 ? round($stars / $loop) : 0,
            'reviews' => $loop,
            'per' => $per,
        ];
        return (object) $data;
    }

    public function display()
    {
        return $this->hasOne(ProductDisplay::class);
    }

}
