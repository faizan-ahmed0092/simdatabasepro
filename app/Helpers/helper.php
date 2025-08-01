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