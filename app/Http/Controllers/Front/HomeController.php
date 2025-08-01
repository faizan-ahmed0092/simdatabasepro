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

    public function liveTracker()
    {
        $path = request()->path();
        $page = Page::where('slug',$path)->firstOrFail();
        // $title = getHeading(Route::currentRouteName());
        return view('front.live-tracker',get_defined_vars());
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
    // public function result(Request $request)
    // {
    //     // dd($request);
      
    //     $mobileNoOrId = $request->number;

    //     // Return sample data for testing
    //     $sampleData = [
    //         [
    //             'MobileNo' => '3001234567',
    //             'NAME' => 'Ahmed Khan',
    //             'CNIC' => '3135145489909',
    //             'ADDRESS' => 'House #123, Street 5, Gulberg III, Lahore',
    //             'op' => 'j'
    //         ],
    //         [
    //             'MobileNo' => '3009876543',
    //             'NAME' => 'Fatima Ali',
    //             'CNIC' => '3135145489909',
    //             'ADDRESS' => 'Apartment 45, Block 7, Clifton, Karachi',
    //             'op' => 't'
    //         ],
    //         [
    //             'MobileNo' => '3012345678',
    //             'NAME' => 'Usman Hassan',
    //             'CNIC' => '3135145489909',
    //             'ADDRESS' => 'Villa 12, Phase 6, DHA, Islamabad',
    //             'op' => 'z'
    //         ]
    //     ];

    //     // For testing purposes, return sample data for any valid input
    //     if(is_numeric($mobileNoOrId)){
    //         if (strlen($mobileNoOrId) == 10 || strlen($mobileNoOrId) == 13) {
    //             $data = $sampleData;
    //         } else {
    //             $data = 'invalid';
    //         }
    //     } else {
    //          $data = 'invalid';
    //     }
     
    //      return view('front.result', compact('data'));
    // }

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
