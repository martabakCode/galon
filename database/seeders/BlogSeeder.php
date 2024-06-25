<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post1 = [
            'title' => [
                'en' => 'Insights. Ideas. Inspiration.',
                'id' => 'Wawasan. Ide. Inspirasi.',
            ],
            'category_id' => 1,
            'excerpt_en' => 'Take your marketing further with Galon Mart. Think with Galon Mart.',
            'excerpt_id' => 'Majukan pemasaran Anda dengan Galon Mart. Berpikir dengan Galon Mart.',
            'content_en' => 'Those who have taken notes from the past two years of market disruptions know this: steady and nimble wins the race. To stay relevant and be prepared for what is next, knowing what people are prioritizing and what drives their interests is key, and for this, no guesswork is necessary.',
            'content_id' => 'Bagi mereka yang telah mencatat perubahan pasar selama dua tahun terakhir ini, mereka tahu bahwa konsistensi dan kecepatan tanggap adalah kunci untuk meraih kesuksesan. Untuk tetap relevan dan siap menghadapi masa depan, memahami apa yang menjadi prioritas dan apa yang mendorong minat orang adalah krusial. Di sinilah tidak ada ruang untuk asumsi.',
            'thumbnail' => 'blog/post1.jpg',
            'reads' => 217,
            'time_read' => '12.00',
        ];
        Blog::create($post1);

        $post2 = [
            'title' => [
                'en' => 'eCommerce Marketing',
                'id' => 'Pemasaran E-commerce',
            ],
            'category_id' => 2,
            'excerpt_en' => 'E-commerce simply refers to the transactions in which individuals and businesses sell or purchase products over the Internet.',
            'excerpt_id' => 'E-commerce secara sederhana mengacu pada transaksi di mana individu dan bisnis menjual atau membeli produk melalui Internet.',
            'content_en' => 'E-commerce simply refers to the transactions in which individuals and businesses sell or purchase products over the Internet. Those who have taken notes from the past two years of market disruptions know this: steady and nimble wins the race. To stay relevant and be prepared for what is next, knowing what people are prioritizing and what drives their interests is key, and for this, no guesswork is necessary.',
            'content_id' => 'E-commerce secara sederhana mengacu pada transaksi di mana individu dan bisnis menjual atau membeli produk melalui Internet. Bagi mereka yang telah mencatat perubahan pasar selama dua tahun terakhir ini, mereka tahu bahwa konsistensi dan kecepatan tanggap adalah kunci untuk meraih kesuksesan. Untuk tetap relevan dan siap menghadapi masa depan, memahami apa yang menjadi prioritas dan apa yang mendorong minat orang adalah krusial. Di sinilah tidak ada ruang untuk asumsi.',
            'thumbnail' => 'blog/post2.jpg',
            'reads' => 1256,
            'time_read' => '9.20',
        ];
        Blog::create($post2);

        $post3 = [
            'title' => [
                'en' => 'Despite the war’s conditions and difficulties, e-commerce is booming in Indonesia',
                'id' => 'Meskipun kondisi perang dan kesulitannya, e-commerce sedang booming di Yaman',
            ],
            'category_id' => 2,
            'excerpt_en' => 'E-commerce flourished in Indonesia despite the conditions of war and the economic crisis, especially after the emergence of many applications specialized in buying and selling.',
            'excerpt_id' => 'E-commerce berkembang pesat di Yaman meskipun kondisi perang dan krisis ekonomi, terutama setelah munculnya banyak aplikasi yang mengkhususkan diri dalam jual beli.',
            'content_en' => 'Despite this, there are a number of difficulties that stand in the way of this modern trade, such as those related to the deterioration of the Internet service and the weakness of the general culture of this medium and its role in life.
            In general, many factors, including the Corona pandemic, contributed to the emergence of e-commerce, albeit very slowly. However, this trade has become one of the main reasons for accelerating the buying and selling processes.',
            'content_id' => 'Namun demikian, ada beberapa kesulitan yang menghambat perdagangan modern ini, seperti yang terkait dengan memburuknya layanan internet dan lemahnya budaya umum dari media ini dan peranannya dalam kehidupan.
            Secara umum, banyak faktor, termasuk pandemi Corona, berkontribusi terhadap munculnya e-commerce, meskipun sangat lambat. Namun, perdagangan ini telah menjadi salah satu alasan utama dalam mempercepat proses jual beli.',
            'thumbnail' => 'blog/post3.jpg',
            'reads' => 3120,
            'time_read' => '13.50',
        ];
        Blog::create($post3);
    }
}
