<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS in production
        if(config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // Add lazy loading directive for images
        Blade::directive('lazyimg', function ($expression) {
            return "<?php echo '<img loading=\"lazy\" ' . $expression . '>'; ?>";
        });

        // Add optimized image directive
        Blade::directive('optimg', function ($expression) {
            return "<?php 
                \$src = $expression;
                \$webp = str_replace(['.jpg', '.jpeg', '.png'], '.webp', \$src);
                echo '<picture>';
                echo '<source srcset=\"' . \$webp . '\" type=\"image/webp\">';
                echo '<img src=\"' . \$src . '\" loading=\"lazy\" alt=\"\">';
                echo '</picture>';
            ?>";
        });

        // Add critical CSS directive
        Blade::directive('criticalcss', function ($expression) {
            return "<?php echo '<style>' . file_get_contents(public_path($expression)) . '</style>'; ?>";
        });

        // Add preload directive
        Blade::directive('preload', function ($expression) {
            return "<?php 
                \$parts = explode(',', $expression);
                \$href = trim(\$parts[0], '\"');
                \$as = isset(\$parts[1]) ? trim(\$parts[1], '\"') : 'style';
                echo '<link rel=\"preload\" href=\"' . \$href . '\" as=\"' . \$as . '\">';
            ?>";
        });

        // Add defer script directive
        Blade::directive('deferscript', function ($expression) {
            return "<?php echo '<script src=\"' . $expression . '\" defer></script>'; ?>";
        });

        // Add async script directive
        Blade::directive('asyncscript', function ($expression) {
            return "<?php echo '<script src=\"' . $expression . '\" async></script>'; ?>";
        });
    }
}
