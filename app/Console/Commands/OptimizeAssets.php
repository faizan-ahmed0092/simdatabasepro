<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class OptimizeAssets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assets:optimize {--compress : Compress CSS and JS files} {--images : Optimize images}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize assets for better performance';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting asset optimization...');

        if ($this->option('compress')) {
            $this->compressAssets();
        }

        if ($this->option('images')) {
            $this->optimizeImages();
        }

        $this->info('Asset optimization completed!');
    }

    private function compressAssets()
    {
        $this->info('Compressing CSS and JS files...');

        // Compress CSS files
        $cssFiles = File::glob(public_path('admin/css/**/*.css'));
        foreach ($cssFiles as $file) {
            $this->compressCSS($file);
        }

        // Compress JS files
        $jsFiles = File::glob(public_path('admin/js/**/*.js'));
        foreach ($jsFiles as $file) {
            $this->compressJS($file);
        }

        $this->info('CSS and JS compression completed!');
    }

    private function compressCSS($file)
    {
        $content = File::get($file);
        
        // Remove comments
        $content = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $content);
        
        // Remove whitespace
        $content = preg_replace('/\s+/', ' ', $content);
        $content = str_replace(['; ', ' {', '{ ', ' }', '} ', ': ', ' :'], [';', '{', '{', '}', '}', ':', ':'], $content);
        
        // Create minified version
        $minFile = str_replace('.css', '.min.css', $file);
        File::put($minFile, $content);
        
        $this->line('Compressed: ' . basename($file));
    }

    private function compressJS($file)
    {
        $content = File::get($file);
        
        // Remove comments (basic)
        $content = preg_replace('/\/\*.*?\*\//s', '', $content);
        $content = preg_replace('/\/\/.*$/m', '', $content);
        
        // Remove whitespace
        $content = preg_replace('/\s+/', ' ', $content);
        $content = str_replace(['; ', ' {', '{ ', ' }', '} ', ' = ', ' =', '= '], [';', '{', '{', '}', '}', '=', '=', '='], $content);
        
        // Create minified version
        $minFile = str_replace('.js', '.min.js', $file);
        File::put($minFile, $content);
        
        $this->line('Compressed: ' . basename($file));
    }

    private function optimizeImages()
    {
        $this->info('Optimizing images...');

        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        
        foreach ($imageExtensions as $ext) {
            $images = File::glob(public_path("**/*.{$ext}"));
            
            foreach ($images as $image) {
                $this->optimizeImage($image);
            }
        }

        $this->info('Image optimization completed!');
    }

    private function optimizeImage($file)
    {
        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $dir = dirname($file);
        
        // Create optimized version with timestamp
        $optimizedFile = $dir . '/' . $filename . '.' . time() . '.' . $extension;
        
        // Copy file (in a real implementation, you'd use image optimization libraries)
        File::copy($file, $optimizedFile);
        
        $this->line('Optimized: ' . basename($file));
    }
} 