<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Resources\ProduitResource;

class ProduitController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = ProduitResource::collection(Produit::get());
        return $this->apiResponse( $products,'ok',200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Produit::create($request->all());
        if ($product) {
            return $this->apiResponse($product, "Produit Saved successfully", 201);
        } else {
            return $this->apiResponse(null,  "Produit not saved", 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit,$id)
    {
        $produit = Produit::find($id);
        if($produit){
            return $this->apiResponse(new ProduitResource($produit),message:'ok',status:200);
            }
            
            return $this->apiResponse(data:null,message:'the product not found',status:404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
       
        $produit = Produit::find($id);
        if (!$produit) {
            return $this->apiResponse(null, 'product  not found', 404);
        }
        $produit->update($request->all());
        if($produit){
            return $this->apiResponse($produit,'product updated',201);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit,$id)
    {
        $produit = Produit::find($id);
        if (!$produit) {
            return $this->apiResponse(null, 'product  not found', 404);
        }
        $produit->delete();

        if ($produit) {
            return $this->apiResponse(null, 'product deleted', 200);
        }

    }
}
