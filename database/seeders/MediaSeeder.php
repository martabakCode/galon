<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // categories media
        $name['en'] = 'Bottle';
        $name['id'] = 'Bottle';
        $media =
            [
            'id' => 1,
            'name' => $name,
            'path' => 'categories/bottle.jpeg
            ',
            'size' => '34000',
            'type' => 'Category',
            'item_id' => 3, //category id
            'description' => 'Gambar kategori botol',
        ];
        Media::create($media);

        $name['en'] = 'Gallon';
        $name['id'] = 'Galon';
        $media =
            [
            'id' => 2,
            'name' => $name,
            'path' => 'categories/gallon.jpg',
            'size' => '34000',
            'type' => 'Category',
            'item_id' => 2,
            'description' => 'Gambar kateogri galon',
        ];
        Media::create($media);

        $name['en'] = 'Gallon';
        $name['id'] = 'Galon';
        $media =
            [
            'id' => 3,
            'name' => $name,
            'path' => 'categories/gallon.jpg',
            'size' => '34000',
            'type' => 'Category',
            'item_id' => 1,
            'description' => 'Gambar kateogri galon',
        ];
        Media::create($media);

        $name['en'] = 'Aqua';
        $name['id'] = 'Aqua';
        $media =
            [
            'id' => 6,
            'name' => $name,
            'path' => 'brands/aqua.png',
            'size' => '34000',
            'type' => 'Brand',
            'item_id' => 1,
            'description' => 'Gambar Aqua',
        ];
        Media::create($media);

        $name['en'] = 'Leminerale';
        $name['id'] = 'Leminerale';
        $media =
            [
            'id' => 7,
            'name' => $name,
            'path' => 'brands/leminerale.png',
            'size' => '34000',
            'type' => 'Brand',
            'item_id' => 2,
            'description' => 'Gambar Leminerale',
        ];
        Media::create($media);

        $name['en'] = 'Cleo';
        $name['id'] = 'Cleo';
        $media =
            [
            'id' => 8,
            'name' => $name,
            'path' => 'brands/cleo.png',
            'size' => '34000',
            'type' => 'Brand',
            'item_id' => 3,
            'description' => 'Gambar Cleo',
        ];
        Media::create($media);

        $name['en'] = 'Club';
        $name['id'] = 'Club';
        $media =
            [
            'id' => 9,
            'name' => $name,
            'path' => 'brands/club.webp',
            'size' => '34000',
            'type' => 'Brand',
            'item_id' => 4,
            'description' => 'Gambar Club',
        ];
        Media::create($media);

        //products media
        $name['en'] = 'Aqua';
        $name['id'] = 'Aqua';
        $media =
            [
            'id' => 10,
            'name' => $name,
            'path' => 'products/aqua.png',
            'size' => '34000',
            'type' => 'Product',
            'item_id' => 1, //product id
            'description' => 'Gambar Galon Aqua',
        ];
        Media::create($media);

        $name['en'] = 'Le Minerale';
        $name['id'] = 'Le Minerale';
        $media =
            [
            'id' => 11,
            'name' => $name,
            'path' => 'products/leminerale.png',
            'size' => '34000',
            'type' => 'Product',
            'item_id' => 2, //product id
            'description' => 'Gambar Galon Le Minerale',
        ];
        Media::create($media);

        $name['en'] = 'Club';
        $name['id'] = 'Club';
        $media =
            [
            'id' => 12,
            'name' => $name,
            'path' => 'products/club.png',
            'size' => '34000',
            'type' => 'Product',
            'item_id' => 3, //product id
            'description' => 'Gambar Galon Club',
        ];
        Media::create($media);

        $name['en'] = 'Cleo';
        $name['id'] = 'Cleo';
        $media =
            [
            'id' => 13,
            'name' => $name,
            'path' => 'products/cleo.png',
            'size' => '34000',
            'type' => 'Product',
            'item_id' => 4, //product id
            'description' => 'Gambar Galon Cleo',
        ];
        Media::create($media);

        $name['en'] = 'Aqua';
        $name['id'] = 'Aqua';
        $media =
            [
            'id' => 14,
            'name' => $name,
            'path' => 'products/aqua.png',
            'size' => '34000',
            'type' => 'Product',
            'item_id' => 5, //product id
            'description' => 'Gambar Galon Aqua',
        ];
        Media::create($media);

        $name['en'] = 'Le Minerale';
        $name['id'] = 'Le Minerale';
        $media =
            [
            'id' => 15,
            'name' => $name,
            'path' => 'products/leminerale.png',
            'size' => '34000',
            'type' => 'Product',
            'item_id' => 6, //product id
            'description' => 'Gambar Galon Le Minerale',
        ];
        Media::create($media);

        $name['en'] = 'Club';
        $name['id'] = 'Club';
        $media =
            [
            'id' => 16,
            'name' => $name,
            'path' => 'products/club.png',
            'size' => '34000',
            'type' => 'Product',
            'item_id' => 7, //product id
            'description' => 'Gambar Galon Club',
        ];
        Media::create($media);

        $name['en'] = 'Cleo';
        $name['id'] = 'Cleo';
        $media =
            [
            'id' => 17,
            'name' => $name,
            'path' => 'products/cleo.png',
            'size' => '34000',
            'type' => 'Product',
            'item_id' => 8, //product id
            'description' => 'Gambar Galon Cleo',
        ];
        Media::create($media);
    }

}
