<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceCategoryRequest;
use App\Http\Requests\UpdateServiceCategoryRequest;
use App\Models\ServiceCategory;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ServiceCategory::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceCategoryRequest $request)
    {
        ServiceCategory::create($request->all());
        return response()->json(['message' => 'Service category created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCategory $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceCategoryRequest  $request
     * @param  \App\Models\ServiceCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceCategoryRequest $request, ServiceCategory $category)
    {
        $category->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceCategory $category)
    {
        $category->delete();
        return response()->json();
    }
}
