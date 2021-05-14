<?php
//
//namespace App\Console\Commands;
//
//use App\Models\Product;
//use App\Models\Specialty;
//use App\Models\Store;
//use App\Models\User;
//use Illuminate\Console\Command;
//use Illuminate\Support\Facades\File;
//use Illuminate\Support\Str;
//use Spatie\Sitemap\Sitemap;
//use Spatie\Sitemap\Tags\Url;
//
//class GenerateSitemapCommand extends Command
//{
//    /**
//     * The name and signature of the console command.
//     *
//     * @var string
//     */
//    protected $signature = 'sitemap:generate';
//
//    /**
//     * The console command description.
//     *
//     * @var string
//     */
//    protected $description = 'Generate a sitemap';
//    /**
//     * @var Sitemap
//     */
//    private $sitemap;
//
//    /**
//     * Create a new command instance.
//     *
//     * @param Sitemap $sitemap
//     */
//    public function __construct(Sitemap $sitemap)
//    {
//        parent::__construct();
//        $this->sitemap = $sitemap;
//    }
//
//    /**
//     * Execute the console command.
//     *
//     * @return int
//     */
//    public function handle()
//    {
//        $map = $this->sitemap->create();
//        $url = Url::create(route('home'))
//            ->setChangeFrequency(URL::CHANGE_FREQUENCY_DAILY)
//            ->setLastModificationDate(now())
//            ->setPriority(0.9);
//        $map->add($url);
//
//        $url = Url::create(route('portfolio.contact'))
//            ->setChangeFrequency(URL::CHANGE_FREQUENCY_DAILY)
//            ->setLastModificationDate(now())
//            ->setPriority(0.9);
//        $map->add($url);
//
//        $url = Url::create(route('projects.index'))
//            ->setChangeFrequency(URL::CHANGE_FREQUENCY_DAILY)
//            ->setLastModificationDate(now())
//            ->setPriority(0.9);
//        $map->add($url);
//
//        $map->writeToFile(public_path('sitemap.xml'));
//
//        if (!File::exists(public_path('sitemaps'))) {
//            File::makeDirectory(public_path('sitemaps'));
//        }
//
//        $map->writeToFile(public_path('sitemaps/' . now()->format('Y_m_d') . '_sitemap_.xml'));
//
//        $this->info('Sitemap generated successfully ! ');
//        return 0;
//    }
//}
