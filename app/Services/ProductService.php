<?php
namespace App\Services;

use App\Models\Product;

class ProductService{

    /**
     * Create Product.
     */
    public function store($id, $name, $article, $status, $data){
        return Product::create([
            'name' => $name,
            'article' => $article,
            'status' => $status,
            'data' => json_encode($data)
        ]);
    }

    /**
     * Get Product.
     */
    public function get(){
        return Product::status()->get();
    }

    /**
     * Destroy Product.
     */
    public function destroy(int $id){
        $product = Product::findOrFail($id);
        return $product->delete();
    }

    /**
     * Update Product.
     */
    public function update(int $id,...$data){
        $product = Product::findOrFail($id);

        if($data['name']){
            $product->name = $data['name'];
        }

        if($data['article']){
            $product->article = $data['article'];
        }

        if($data['status']){
            $product->status = $data['status'];
        }

        if($data['data']){
            $product->data = $data['data'];
        }

        $product->save();

        return $product;
    }
}

?>
