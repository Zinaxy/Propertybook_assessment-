<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Resources\ServiceResource;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Service::latest()->get();
        return view('admin.Service.index',[
            'services' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required','max:255','string'],
            'icon' => ['required','mimes:svg']
        ]);

        /* upload icon image */
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $iconImage = time(). '_service'.'.' . $extension;
            $file->move('images/services_icons/', $iconImage);
        }

        $service = new Service;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->icon = $iconImage;
        $service->save();

        return redirect(route('services.index'))->with('success','Service created Successfull');
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
         $data = Service::FindorFail($id);
        return view('admin.Service.update',[
            'service' => $data,
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
            'icon' => ['required','mimes:svg']
        ]);

        $service = Service::FindorFail($id);
        /* upload cover image */
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $iconImage = time(). '_service'.'.' . $extension;
            $file->move('images/services_icons/', $iconImage);

                #delete the original image
                if (File::exists('icon')) {
                File::delete('images/services_icons/', $service->icon);
                }
        }

        $service->title = $request->title;
        $service->description = $request->description;
        $service->icon = $iconImage;
        $service->update();

        return redirect(route('services.index'))->with('success','Service created Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::Findorfail($id);

        #delete the icon in the file storage
         File::delete('images/services_icons/', $service->icon);

        #delete service in the database
          $service->delete();
         return redirect(route('services.index'))->with('success','Service deleted Successfull');

    }
}
