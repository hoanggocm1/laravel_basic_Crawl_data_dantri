<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\hrefPost;
use App\Models\Post;
use Weidner\Goutte\GoutteFacade;
use Illuminate\Support\Str;

class CrawlPostController extends Controller
{

    public function carwl_dantri()
    {
        return view('admin.post.post.carwl_dantri', [
            'title' => 'dantri.com',
        ]);
    }
    public function carwl_dantri_store()
    {

        $dem = 0;
        set_time_limit(1000);
        $dantri = 'https://dantri.com.vn';
        $crawl = GoutteFacade::request('GET', $dantri);
        $links = $crawl->filter('ol.submenu a')->each(function ($node) {
            return $node->attr('href');
        });

        for ($i = 0; $i < count($links); $i++) {
            $this->getHrefCategory($links[$i]);
        }
        session()->flash('success', 'Kết thúc quá trình carwl');

        return redirect()->back();
    }
    protected function getHrefCategory($url)
    {
        $crawl = GoutteFacade::request('GET', $url);

        $image_zoom = $crawl->filter('div.article.list div.article-thumb a img')->each(function ($node) use ($url) {
            return $node->attr('data-src');
        });

        $crawl->filter('div.article.list div.article-thumb a')->each(function ($node, $i) use ($url, $image_zoom) {
            $hrefPost = $node->attr('href');
            $checkIssetPost = hrefPost::where('hrefPost', $hrefPost)->first();
            if ($checkIssetPost == null) {
                $this->getData($hrefPost, $url, $image_zoom[$i]);
            }
        });
    }
    protected function getData($hrefPost, $category, $image_zoom)
    {

        // $dem += 1;
        $category_ = explode('.', $category)[0];
        $pos2 = strpos($category_, '/', 1);
        $name_danh_muc1 = (substr($category_, $pos2 + 1));

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

        hrefPost::create([
            'hrefPost' => $hrefPost,
        ]);
        Post::create($data);
    }
    protected function crawlData(string $type, $crawler)
    {
        $result = $crawler->filter($type)->each(function ($node) {
            return $node->text();
        });

        if (!empty($result)) {
            return $result[0];
        }
        return '';
    }
}
