<?php

namespace Lynerx\Http\Controllers;

use Illuminate\Http\Request;
use Lynerx\Http\Requests\CreateSeriesRequest;
use illuminate\Support\Str;
use Lynerx\Series;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.series/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSeriesRequest $request)
    {
        $uploadedImage = $request->image;
        //upload file
        $fileName = Str::slug($request->title).'.'.$uploadedImage->getClientOriginalExtension();

        $uploadedImage->storePubliclyAs('series', $fileName);
        //Create series
        $series = Series::create([
            'title'=> $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
            // 'description' => $request->
            'image_url'=> 'series/'.$fileName]);
            //redirect user to series page

            session()->flash('success', 'Series Created Successfully');
            return redirect()->route('series.show', $series);
    }  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Series $series)
    {
        // dd($series);

        return view('admin.series.index')->withSeries($series);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
