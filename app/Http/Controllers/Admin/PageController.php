<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Media;



class PageController extends Controller
{
    public function index()
    {
        $list = Page::all();
        return view('admin.pages.index',get_defined_vars());
    }

    public function create()
    {
        return view('admin.pages.create');
    }
   public function store(Request $request)
    {
        if (Page::where('slug', $request->slug)->exists()) {
            return redirect()->back()
                ->with('error', 'A page with this slug already exists.')
                ->withInput();
        }
    
        Page::create($request->except('_token'));
    
        return redirect()->route('admin.pages.index')->with('message', 'Successfully created');
    }

    public function edit($id)
    {
        $item = Page::find($id);
        return view('admin.pages.edit',get_defined_vars());
    }

    // public function update(Request $request , $id)
    // {
    //     dd($request);
    //     $page = Page::find($id);
    //     $page->update($request->except('_token'));
    //     return redirect()->route('admin.pages.index')->with('message','Successfully Updated');
    // }


    public function fileUpload(Request $request)
    {
        $image = null;
        
        $image = uploadImage($request->upload,'uploads/images');
        return response()->json(['fileName' => $image, 'uploaded'=> 1,'url' => asset($image)]);
    }

    public function update(Request $request, $id)
    {
        $page = Page::find($id);
        if($request->content)
        {
            
            // Convert <oembed> to <iframe>
            $convertedContent = convertOembedToIframe($request->content);
            $data['content'] = $convertedContent;
        }
    
        // Prepare the data and update
        $data = $request->except('_token');
        
    
        $page->update($data);
    
        return redirect()->route('admin.pages.index')->with('message', 'Successfully Updated');
    }
    public function destroy($id)
    {
       
        Page::findOrFail($id)->delete();

        return redirect()->route('admin.pages.index')->with('message','Successfully Deleted!');
    }

    public function pageDesign($id)
    {
        $page = Page::find($id);
        if($page)
        {
            return view('admin.pages.design',get_defined_vars());
        }
    }

public function pageStatus($id)
{
    $page = Page::find($id);
    $status = $page->status == 1 ? 0 : 1;
    $page->update(['status' => $status]);
    return redirect()->route('admin.pages.index')->with('message','Successfully Status Changed!');
}

    public function upload(Request $request)
    {
        $image = null;
       
        if($request->upload)
        {
            $imgitem = New Media();
            $image=uploadImage($file,'uploads/pages');
            $imgitem->filename = $image;
            $imgitem->save();
        }
        return response()->json(['url' =>  $image]);
    }

}
