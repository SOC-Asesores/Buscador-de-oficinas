<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\User;
class GenerateSitemap extends Command
{
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
    protected $description = 'Automatically Generate an XML Sitemap';
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $postsitmap = Sitemap::create();
        User::get()->each(function (User $post) use ($postsitmap) {
            
        $rest = substr($post->ciudad, -1);
        $ciudad_seo = "";
        if($rest === " "){
            $ciudad_seo = rtrim($post->ciudad, " ");
        }else{
            $ciudad_seo = $post->ciudad;
        }
    
            $postsitmap->add(
                Url::create("https://socasesores.com/oficinas/{$ciudad_seo}/{$post->estado}/{$post->url_clean}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });
        $postsitmap->writeToFile(public_path('sitemap.xml'));
    }
}