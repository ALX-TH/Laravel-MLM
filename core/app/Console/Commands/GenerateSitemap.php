<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Post;
use App\Page;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
class GenerateSitemap extends Command
{
    const locale = 'en';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genarate sitemap.xml file for application';

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
     * @return Post[]|\Illuminate\Database\Eloquent\Collection
     */
    protected function getPosts()
    {
        return Post::all();
    }

    /**
     * @return Page[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    protected function getPages()
    {
        return Page::whereStatus(1)->get();
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = '../sitemap.xml';
        $posts = $this->getPosts();
        $sitemap = Sitemap::create();

        foreach ($this->getPages() as $page) {

            $sitemap->add(Url::create(route('viewPage', ['slug' => $page->slug]))
                ->setLastModificationDate(Carbon::parse($page->updated_at))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.1)
                );
        }

        foreach ($posts as $post){
            $sitemap->add(Url::create(route('viewPost', ['slug' => $post->slug]))
                ->setLastModificationDate(Carbon::parse($page->updated_at))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.1)
            );
        }

        $sitemap->writeToFile($path);

    }

}