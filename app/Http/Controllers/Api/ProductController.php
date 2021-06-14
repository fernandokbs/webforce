<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function __construct()
    {
        ProductResource::withoutWrapping();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection(Product::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        Gate::authorize('product-action');
        $product = Product::create($request->all());

        if($request->hasFile('thumbnail'))
            $product->addMedia($request->file('thumbnail'))->toMediaCollection('images');

        return (new ProductResource( $product ))
                ->response()
                ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        Gate::authorize('product-action');
        $product->update($request->all());
        return (new ProductResource( Product::find($product->id) ))
                ->response()
                ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Gate::authorize('product-action');
        $product->delete();
        return response([], Response::HTTP_NO_CONTENT);
    }
}
