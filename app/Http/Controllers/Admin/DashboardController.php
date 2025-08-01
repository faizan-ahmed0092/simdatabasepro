<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

   public function whatsApp()
    {
        $user = User::first(); // Or use auth()->user() if it's the logged-in user
        $number = $user->whatsapp_number;
        $google_ad_script = $user->google_ad_script;
    
        return view('admin.setting.index', compact('number', 'google_ad_script'));
    }

    public function store(Request $request)
    {
      
        $user = auth()->user();
        $user->update($request->except('_token'));
        return redirect()->back()->with('message','Successfully Updated');

    }
}
