<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OptimizeImages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only optimize HTML responses
        if ($response->headers->get('content-type') && 
            str_contains($response->headers->get('content-type'), 'text/html')) {
            
            $content = $response->getContent();
            
            // Only add lazy loading to images that don't already have it
            $content = preg_replace('/<img((?![^>]*loading=)[^>]*)>/i', '<img$1 loading="lazy">', $content);
            
            // Add WebP support for images (only for specific image types)
            $content = preg_replace_callback(
                '/<img([^>]*src=["\']([^"\']*\.(jpg|jpeg|png))["\'][^>]*)>/i',
                function($matches) {
                    $imgTag = $matches[0];
                    $src = $matches[2];
                    
                    // Only add WebP support for local images
                    if (strpos($src, 'http') !== 0 && !str_contains($imgTag, '<picture>')) {
                        $webpSrc = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $src);
                        
                        return '<picture>' .
                               '<source srcset="' . $webpSrc . '" type="image/webp">' .
                               $imgTag .
                               '</picture>';
                    }
                    
                    return $imgTag;
                },
                $content
            );
            
            // Add preload for critical images (only first 3 and only local images)
            if (preg_match_all('/<img[^>]*src=["\']([^"\']*)["\'][^>]*>/i', $content, $matches)) {
                $preloads = '';
                $count = 0;
                foreach ($matches[1] as $src) {
                    if ($count >= 3) break; // Only preload first 3 images
                    
                    // Only preload local images that don't already have preload
                    if (strpos($src, 'http') !== 0 && !str_contains($content, 'rel="preload" as="image" href="' . $src . '"')) {
                        $preloads .= '<link rel="preload" as="image" href="' . $src . '">';
                        $count++;
                    }
                }
                if ($preloads) {
                    $content = str_replace('</head>', $preloads . '</head>', $content);
                }
            }
            
            $response->setContent($content);
        }

        return $response;
    }
} 