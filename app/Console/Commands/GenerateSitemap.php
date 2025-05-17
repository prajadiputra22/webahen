<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap.xml file';

    public function handle()
    {
        $sitemap = Sitemap::create();
        
        // Tambahkan halaman utama
        $sitemap->add(Url::create('/')->setLastModificationDate(now()));
        
        // Tambahkan halaman /about
        $sitemap->add(Url::create('/about')->setLastModificationDate(now()));
        
        // Tambahkan halaman /products
        $sitemap->add(Url::create('/products')->setLastModificationDate(now()));
        
        // Tambahkan halaman posts
        Post::all()->each(function (Post $post) use ($sitemap) {
            $sitemap->add(Url::create("/posts/{$post->slug}")
                ->setLastModificationDate($post->updated_at));
        });
        
        $sitemap->writeToFile(public_path('sitemap.xml'));
        
        $this->info('Sitemap berhasil dibuat!');
    }
}