<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = Category::all();
        return view('category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return  redirect()->back()->with('success', 'categorie enregistrer');
    }

    /**
     * Display the specified resource.
     */
    public function liste()
    {
        //
        $category = Category::all();
        return view('category.liste', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        //
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        $category = new Category();
        $category->name = $request->name;
        $category->update();
        return redirect()->back()->with('success', 'Catégorie modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        //
        $category = Category::find($id);
        $category->delete();

        return redirect()->back()->with('succes', 'catégorie supprimée');
    }
    public function destroyall(Request $request, $ids)
    {
        $ids = $request->$ids;
        Category::whereIn('id', $ids)->delete();
        return response()->json(['success' => 'Categories supprimées']);
    }
}
