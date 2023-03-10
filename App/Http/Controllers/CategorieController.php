<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::orderBy('id')->get();

        return response()->json([
            'status' => 'success',
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategorieRequest $request)
    {
        $category = Categorie::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Category Created successfully!",
            'category' => $category
        ], 201);
    }

    /**
     * Display the specified resource.
     */

    public function show($category)
{
    $category = Categorie::find($category);
    if (!$category) {
        return response()->json(['message' => 'Category not found'], 404);
    }
    return response()->json($category, 200);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   
    public function update(UpdateCategorieRequest $request, $id)
    {
        $categorie = Categorie::find($id);
    
        if (!$categorie) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $categorie->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "Category Updated successfully!",
            'category' => $categorie
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie,$id)
    {
        $categorie = Categorie::find($id);
        if (!$categorie) {
            return response()->json([
                'message' => 'Categorie not found'
            ], 404);
        }
    
        $categorie->delete();
    
        return response()->json([
            'status' => true,
            'message' => 'Categorie deleted successfully'
        ], 200);
    }
}
