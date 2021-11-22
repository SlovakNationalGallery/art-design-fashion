<?php

namespace App\Http\Controllers;

use App\Http\Resources\CabinetResource;
use App\Models\Cabinet;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CabinetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabinets = Cabinet::all();
        return Inertia::render('Admin/Cabinet/List', compact('cabinets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Cabinet/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cabinet = new Cabinet();
        $cabinet
            ->fill($request->all())
            ->save();

        $cabinet
            ->addFromMediaLibraryRequest($request->images)
            ->toMediaCollection('images');

        return redirect()->route('admin.cabinets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cabinet  $cabinet
     * @return \Illuminate\Http\Response
     */
    public function show(Cabinet $cabinet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cabinet  $cabinet
     * @return \Illuminate\Http\Response
     */
    public function edit(Cabinet $cabinet)
    {
        $resource = new CabinetResource($cabinet);
        return Inertia::render('Admin/Cabinet/Edit', compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cabinet  $cabinet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cabinet $cabinet)
    {
        $cabinet
            ->fill($request->all())
            ->save();

        $cabinet
            ->syncFromMediaLibraryRequest($request->images)
            ->toMediaCollection('images');

        return redirect()->route('admin.cabinets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cabinet  $cabinet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cabinet $cabinet)
    {
        $cabinet->delete();
        return redirect()->route('admin.cabinets.index');
    }
}
