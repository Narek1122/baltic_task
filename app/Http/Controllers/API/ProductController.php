<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest as ProductStoreRequest;
use App\Http\Requests\Product\UpdateArticleRequest as ProductUpdateArticleRequest;
use App\Http\Requests\Product\UpdateRequest as ProductUpdateRequest;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{
    /**
     * Create a new ProductService instance.
     *
     * @return void
     */
    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
        $this->middleware('auth:api', ['except' => ['login','signup']]);
    }

    /**
     * Store product.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductStoreRequest $request){
        $product = $this->product_service->store(auth()->user()->id,...$request->all());


        return response()->json([
            'status' => true,
            'product' => $product
        ],201);
    }

    /**
     * Get products.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $products = $this->product_service->get();


        return response()->json([
            'status' => true,
            'products' => $products
        ],201);
    }

    /**
     * Update product.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(int $id, ProductUpdateRequest $request){
        $product = $this->product_service->update($id,...$request->all());


        return response()->json([
            'status' => true,
            'product' => $product
        ],200);
    }

    /**
     * Update article product.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateArticle(int $id, ProductUpdateArticleRequest $request){
        $product = $this->product_service->update($id,...$request->all());

        return response()->json([
            'status' => true,
            'product' => $product
        ],200);
    }

     /**
     * Delete product.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id){
        $product = $this->product_service->destroy($id);

        return response()->json([
            'status' => true,
        ],200);
    }
}
