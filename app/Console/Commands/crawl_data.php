<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Weidner\Goutte\GoutteFacade;

class crawl_data extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:dantri';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dantri = 'https://dantri.com.vn';
        $crawl = GoutteFacade::request('GET', $dantri);
        $links = $crawl->filter('ol.submenu a')->each(function ($node) {
            return $node->attr('href');
        });

        for ($i = 0; $i < count($links); $i++) {
            // $pos2 = strpos($links[$i], '/', 1);
            // $name_danh_muc = (substr($links[$i], 1, $pos2 - 1));
            $this->getHrefCategory($links[$i]);
        }
    }

    public function getHrefCategory($url)
    {

        $crawl = GoutteFacade::request('GET', $url);

        $image_zoom =  $crawl->filter('div.article.list div.article-thumb a img')->each(function ($node) use ($url) {
            return $node->attr('data-src');
        });

        $crawl->filter('div.article.list div.article-thumb a')->each(function ($node, $i) use ($url, $image_zoom) {

            $hrefPost = $node->attr('href');
            $this->getData($hrefPost, $url, $image_zoom[$i]);
        });
    }
    public function getData($hrefPost, $category, $image_zoom)
    {
        $goc = explode('.', $category)[0];
        $pos2 = strpos($goc, '/', 1);
        $name_danh_muc1 = (substr($goc, $pos2 + 1));

        $crawl = GoutteFacade::request('GET', $hrefPost);

        $title = $this->crawlData('h1.title-page.detail', $crawl);

        $content = $this->crawlData('article.singular-container h2.singular-sapo', $crawl);
        $content = str_replace('(Dân trí) ', '', $content);

        $description = $this->crawlData('article.singular-container div.singular-content', $crawl);

        $images_thumbs = $crawl->filter('figure.image.align-center img')->each(function ($node) {
            return $node->attr('src');
        });
        if ($images_thumbs != null) {
            $images_thumb = $images_thumbs[0];
        } else {
            $images_thumb = '';
        }

        $data = [
            'title' => $title,
            'content' => $content,
            'title_slug' => Str::slug($title, '-') . '-' . rand(0, 9999) . '.htm',
            'description' => $description,
            'image_zoom_post' => $image_zoom,
            'image_thumb_post' => $images_thumb,
            'parent_post_children_slug' => $name_danh_muc1,
            'status' => 1,
        ];

        Post::create($data);
    }
}
