<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Route;
use App\Models\Goodluck2020;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.index');
    }


    public function result(Request $request)
    {
        // dd($request);
      
        $mobileNoOrId = $request->number;

      
        if(is_numeric($mobileNoOrId)){
            if (strlen($mobileNoOrId) == 10) {
                $data = Goodluck2020::where('MobileNo', $mobileNoOrId) ->take(1)->get();
                $AssociatedNumbers = $data->count() > 0 ? Goodluck2020::where('CNIC', $data[0]->CNIC)->where('MobileNo', '!=', $mobileNoOrId)->distinct()->pluck('MobileNo')->toArray() : [];
            } elseif (strlen($mobileNoOrId) == 13) {
                $data = Goodluck2020::where('CNIC', $mobileNoOrId)->get();
               
            } else {
                $data = 'invalid';
            }
        } else {
             $data = 'invalid';
        }
        $AssociatedNumbers = $AssociatedNumbers ?? [];
         return view('front.result', compact('data', 'AssociatedNumbers'));
    }


    public function services()
    {
        return view('front.services');
    }
    
    public function faqs()
    {
 
        return view('front.faqs');
    }
    
     public function blog()
    {
        $items = Page::where('appearance_type','blog')->get();
        // dd($page);
        return view('front.blog',get_defined_vars());
    }
    public function contactUs()
    {
        $path = request()->path();
        $page = Page::where('slug',$path)->first();
        return view('front.contact',get_defined_vars());
    }

    public function page($slug = null)
    {
        $page = Page::where('slug',$slug)->firstOrFail();
        return view('front.customePage',get_defined_vars());
    }
}
