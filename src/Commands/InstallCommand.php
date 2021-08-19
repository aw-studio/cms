<?php

namespace AwStudio\Cms\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:install';

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
        //https://patorjk.com/software/taag/#p=display&f=Slant&t=AW-CMS
        $this->info('    ___ _       __      ________  ________');
        $this->info('   /   | |     / /     / ____/  |/  / ___/');
        $this->info('  / /| | | /| / /_____/ /   / /|_/ /\__ \ ');
        $this->info(' / ___ | |/ |/ /_____/ /___/ /  / /___/ / ');
        $this->info('/_/  |_|__/|__/      \____/_/  /_//____/  ');

        // install vitt
        $this->callSilently('lit:install');
        $this->callSilently('vitt:install');
        $this->callSilently('vendor:publish', ['--provider' => "Litstack\Pages\PagesServiceProvider"]);

        $metaMigration = glob(base_path('database/migrations') . '/*create_meta_table.php');
        if (! $metaMigration) {
            $this->callSilently('vendor:publish', ['--provider' => "Litstack\Meta\MetaServiceProvider"]);
        }
        $this->callSilently('migrate');

        $this->installNpmPackages();
        $this->handleLitstackFiles();

        if ($this->confirm('Is it a mulitlanguage project?', false)) {
            $this->makeMultilingual();
        } else {
            $locale = $this->choice('What is the default locale?', ['de', 'en'], 'de');
            $this->makeMonolingual($locale);
        }

        $this->comment("\nPlease execute 'npm install && npm run dev'.\n");
    }

    /**
     * Install NPM-packages.
     *
     * @return void
     */
    public function installNpmPackages()
    {
        $this->updateNodePackages(function ($packages) {
            return [
                '@aw-studio/vue-lit-block'      => '^1.0',
                '@aw-studio/vue-lit-image-next' => '^1.1.2',
                '@headlessui/vue'               => '^1.4.0',
            ] + $packages;
        });
    }

    /**
     * Handle Litstack files.
     *
     * @return void
     */
    public function handleLitstackFiles()
    {
        $this->callSilently('vendor:publish', ['--tag' => 'aw-cms', '--force' => true]);

        $lit = config_path('lit.php');
        if (file_exists($lit)) {
            $find = "'sm' => [300, 300, 8],";
            $replace = "'thumb' => [10, 10, 1],
            'sm' => [300, 300, 8],";

            $file_contents = file_get_contents($lit);
            $file_contents = str_replace(
                $find,
                $replace,
                $file_contents
            );
            file_put_contents($lit, $file_contents);
        }
    }

    /**
     * Update the "package.json" file.
     *
     * @param  callable $callback
     * @param  bool     $dev
     * @return void
     */
    protected static function updateNodePackages(callable $callback, $dev = true)
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );
    }

    /**
     * Make changes to files in order to make app multilingual.
     *
     * @return void
     */
    public function makeMultilingual(): void
    {
        // trans routes
        $webRutes = base_path('routes/web.php');
        if (file_exists($webRutes)) {
            $file_contents = file_get_contents($webRutes);
            $file_contents = str_replace('Route::get', 'Route::trans', $file_contents);
            file_put_contents($webRutes, $file_contents);
        }

        $litstackServiceProvider = base_path('lit/app/Providers/LitstackServiceProvider.php');
        if (file_exists($litstackServiceProvider)) {
            $file_contents = file_get_contents($litstackServiceProvider);
            $file_contents = str_replace('=> route', '=> __route', $file_contents);
            file_put_contents($litstackServiceProvider, $file_contents);
        }
    }

    /**
     * Make changes to files in order to make app monolingual.
     *
     * @return void
     */
    public function makeMonolingual($locale): void
    {
        // trans routes
        $app = config_path('app.php');
        if (file_exists($app)) {
            $file_contents = file_get_contents($app);
            $file_contents = str_replace("'en'", "'" . $locale . "'", $file_contents);
            file_put_contents($app, $file_contents);
        }

        $translatable = config_path('translatable.php');
        if (file_exists($translatable)) {
            $find = "'locales' => [
        'en',
        'de',
    ],";
            $replace = "'locales' => ['" . $locale . "'],";

            $file_contents = file_get_contents($translatable);
            $file_contents = str_replace(
                $find,
                $replace,
                $file_contents
            );
            $file_contents = str_replace("'fallback_locale' => 'en',", "'fallback_locale' => '" . $locale . "',", $file_contents);
            file_put_contents($translatable, $file_contents);
        }
    }
}
