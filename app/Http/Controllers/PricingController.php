<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Price::latest()->get();
        return view('admin.Price.index',[
            'prices' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Price.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'title' => ['required', 'string', 'max:255'],
            'name' => ['required','max:255','string'],
            'price' => ['required','decimal:0,10000'],
            'bullets' =>['required']
        ]);


     # Split features by new lines and store them as an array
        $features = array_filter(array_map('trim', explode(PHP_EOL, $request->bullets)));
        $price = new Price;
        $price->name = $request->name;
        $price->title = $request->title;
        $price->price = $request->price;
        $price->bullets = $features;
        $price->save();

        return redirect(route('prices.index'))->with('success','Price created Successfull');
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
         $data = Price::FindorFail($id);
        return view('admin.Price.update',[
            'price' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $this->validate($request,[
            'title' => ['required', 'string', 'max:255'],
            'name' => ['required','max:255','string'],
            'price' => ['required','decimal:0,10000'],
            'bullets' =>['required']
        ]);

       # Split features by new lines and store them as an array
        $features = array_filter(array_map('trim', explode(PHP_EOL, $request->bullets)));

        $price = Price::FindorFail($id);
        /* upload cover image */

       $price->name = $request->name;
        $price->title = $request->title;
        $price->price = $request->price;
        $price->bullets = $features;
        $price->update();

        return redirect(route('prices.index'))->with('success','Price created Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $price = Price::Findorfail($id);

        #delete price in the database
          $price->delete();
         return redirect(route('prices.index'))->with('success','Price deleted Successfull');

    }
}
