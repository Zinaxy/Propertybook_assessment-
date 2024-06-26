<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\OurStory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\OurStoryResource;

class OurStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content  = OurStory::latest()->first();
        return view('admin.Ourstory.index',[
            'aboutInfo' => new OurStoryResource($content)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Ourstory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        #validation
        $this->validate($request,[
            'heading' => ['required', 'string', 'max:255'],
            'aboutUs' => ['required','max:255','string'],
            'vision' => ['required','max:255','string'],
            'history' => ['required','max:255','string'],
            'cover' => ['required','mimes:png,jpg,jpeg,webp']
        ]);
        /* upload cover image */
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $coverImage = time(). '_hero'.'.' . $extension;
            $file->move('images/about_us/', $coverImage);
        }

        $about = new OurStory;
        $about->heading = $request->heading;
        $about->about_us = $request->aboutUs;
        $about->vision = $request->vision;
        $about->history = $request->history;
        $about->cover = $coverImage;
        $about->save();

        #redirect
         return redirect(route('about-us.index'))->with('success','About info created Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = OurStory::FindorFail($id);
        return view('admin.Ourstory.update',[
            'aboutInfo' => new OurStoryResource($data),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

            $this->validate($request,[
            'heading' => ['required', 'string', 'max:255'],
            'aboutUs' => ['required','max:255','string'],
            'vision' => ['required','max:255','string'],
            'history' => ['required','max:255','string'],
            'cover' => ['required','mimes:png,jpg,jpeg,webp']
        ]);

        $about = OurStory::FindorFail($id);
        /* upload cover image */
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $coverImage = time(). '_hero'.'.' . $extension;
           $file->move('images/about_us/', $coverImage);

                #delete the original image
                if (File::exists('cover')) {
                File::delete('images/about_us/', $about->cover);
                }
        }

        $about->heading = $request->heading;
        $about->about_us = $request->aboutUs;
        $about->vision = $request->vision;
        $about->history = $request->history;
        $about->cover = $coverImage;
        $about->update();

        return redirect(route('about-us.index'))->with('success','About Info Updated Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
