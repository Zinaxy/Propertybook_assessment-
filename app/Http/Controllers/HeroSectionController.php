<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use App\Http\Requests\HeroRequest;
use App\Http\Resources\HeroResource;
use Illuminate\Support\Facades\File;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content  = Hero::latest()->first();
        return view('admin.Hero.index',[
            'heroContent' => new HeroResource($content)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Hero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        #validation
        $this->validate($request,[
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required','max:255','string'],
            'cover' => ['required','mimes:png,jpg,jpeg,webp']
        ]);
        /* upload cover image */
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $coverImage = time(). '_hero'.'.' . $extension;
            $file->move('images/hero/', $coverImage);
        }

        $info = new Hero;
        $info->title = $request->title;
        $info->description = $request->description;
        $info->cover = $coverImage;
        $info->save();

        #redirect
         return redirect(route('hero-content.index'))->with('success','New info created Successfull');
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
        $data = Hero::FindorFail($id);
        return view('admin.Hero.update',[
            'heroContent' => new HeroResource($data),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

         $this->validate($request,[
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required','max:255','string'],
            'cover' => ['required','mimes:png,jpg,jpeg,webp']
        ]);

        $info = Hero::FindorFail($id);
        /* upload cover image */
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $coverImage = time(). '_hero'.'.' . $extension;
            $file->move('images/hero/', $coverImage);

                #delete the original image
                if (File::exists('cover')) {
                File::delete('images/hero/', $info->cover);
                }
        }

        $info->title = $request->title;
        $info->description = $request->description;
        $info->cover = $coverImage;
        $info->update();

        return redirect(route('hero-content.index'))->with('success','Info Updated Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
