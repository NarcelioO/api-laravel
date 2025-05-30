<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $products = ProductResource::collection(Product::all());
        return response()->json([
            'data' => $products,
            'status' => 200,
            'message' => 'Products retrieved successfully'
        ]);
        // return ProductResource::collection($products);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // $product = Product::create($request->validated());
        $product = ProductResource::make(Product::create($request->validated()));
        return response()->json([
            'data' => $product,
            'message' => 'Product created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
