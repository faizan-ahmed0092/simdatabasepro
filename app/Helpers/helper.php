<?php
use App\Models\Page;
use App\Models\User;


function appearanceType()
{
    return [
        // 'Usefull Links',
        'Articles',
        'Latest Article',
        'Navbar',
        'Blog'
    ];
}

function isExistInArray($type,$app)
{
   $arr = explode(',',$type);

   return in_array($app,$arr) ? true : false;
}

function uploadImage($file, $path){
    $name = time().'-'.str_replace(' ', '-', $file->getClientOriginalName());
    $file->move($path,$name);
    return $path.'/'.$name;
} 

function uploadFile($file, $path){
    $name = time().'-'.str_replace(' ', '-', $file->getClientOriginalName());
    $file->move($path,$name);
    return $path.'/'.$name;
}

function getPages($type)
{
   return Page::where('appearance_type', 'like', '%' . $type . '%')->where('status',1)->get();
}

function getwhatsappNumber()
{
    $user = User::first();
    return $user ? $user->whatsapp_number ?? '923278949894' : '923278949894';
     
}

function  getGoogleAdScript()
{
    $user = User::first();
    return $user ? $user->google_ad_script : null;
}

function getHeading($name)
{
    $array = [
        "sim.owner.detail" => 'SIMDATABASE LIVE TRACKER 2024',
        "cnic.tracker" => 'CNIC TRACKER',
        "live.tracker" => 'SIM LIVE TRACKER 2025'
    ];

    return $array[$name];
}

function convertOembedToIframe($content)
{
    return preg_replace_callback(
        '/<oembed url="([^"]+)"><\/oembed>/i',
        function ($matches) {
            return '<iframe width="560" height="315" src="' . str_replace('watch?v=', 'embed/', $matches[1]) . '" 
                    frameborder="0" allowfullscreen></iframe>';
        },
        $content
    );
}

if (!function_exists('optimizeAsset')) {
    function optimizeAsset($path, $type = 'style')
    {
        $fullPath = public_path($path);
        
        if (!file_exists($fullPath)) {
            return asset($path);
        }
        
        $fileTime = filemtime($fullPath);
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $name = pathinfo($path, PATHINFO_FILENAME);
        $dir = dirname($path);
        
        // Add version parameter for cache busting
        $optimizedPath = $dir . '/' . $name . '.' . $fileTime . '.' . $extension;
        
        return asset($optimizedPath);
    }
}

if (!function_exists('lazyImage')) {
    function lazyImage($src, $alt = '', $class = '', $width = null, $height = null)
    {
        $attributes = [];
        
        if ($class) {
            $attributes[] = 'class="' . $class . '"';
        }
        
        if ($width) {
            $attributes[] = 'width="' . $width . '"';
        }
        
        if ($height) {
            $attributes[] = 'height="' . $height . '"';
        }
        
        $attrString = implode(' ', $attributes);
        
        // Generate WebP version
        $webpSrc = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $src);
        
        return '<picture>' .
               '<source srcset="' . $webpSrc . '" type="image/webp">' .
               '<img src="' . $src . '" alt="' . $alt . '" loading="lazy" ' . $attrString . '>' .
               '</picture>';
    }
}

if (!function_exists('preloadAsset')) {
    function preloadAsset($path, $as = 'style')
    {
        return '<link rel="preload" href="' . asset($path) . '" as="' . $as . '">';
    }
}

if (!function_exists('deferScript')) {
    function deferScript($path)
    {
        return '<script src="' . asset($path) . '" defer></script>';
    }
}

if (!function_exists('asyncScript')) {
    function asyncScript($path)
    {
        return '<script src="' . asset($path) . '" async></script>';
    }
}

if (!function_exists('criticalCSS')) {
    function criticalCSS($path)
    {
        $fullPath = public_path($path);
        
        if (file_exists($fullPath)) {
            return '<style>' . file_get_contents($fullPath) . '</style>';
        }
        
        return '';
    }
}

if (!function_exists('isMobile')) {
    function isMobile()
    {
        $userAgent = request()->header('User-Agent');
        return preg_match('/(android|iphone|ipad|mobile)/i', $userAgent);
    }
}

if (!function_exists('optimizeForMobile')) {
    function optimizeForMobile($desktopValue, $mobileValue = null)
    {
        if (isMobile()) {
            return $mobileValue ?? $desktopValue;
        }
        
        return $desktopValue;
    }
}

if (!function_exists('minifyHTML')) {
    function minifyHTML($html)
    {
        // Remove comments
        $html = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $html);
        
        // Remove whitespace between tags
        $html = preg_replace('/>\s+</', '><', $html);
        
        // Remove whitespace at the beginning and end
        $html = trim($html);
        
        return $html;
    }
}