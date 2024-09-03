<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product as ProductResources;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return response()->json([
            'status'=> true,
            'message' => 'Danh sách món ăn',
            'product' => ProductResources::collection($product)
        ], 200);
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
        $product = Product::create($request->all());
        $arr = [
            'status'=> true,
            'message' => 'Thêm món ăn thành công.',
            'data' => new ProductResources($product)
        ];
        return response()->json($arr, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        if(!$product)
        {
            return response()->json([
                'status' => false,
                'message' => 'Không tìm thấy món ăn.'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => new ProductResources($product)
        ], 200);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if(!$product)
        {
            return response()->json([
                'status' => false,
                'message' => 'Không tìm thấy món ăn.'
            ], 404);
        }

        $product->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật món ăn thành công.',
            'data' => new ProductResources($product)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa món ăn thành công.',
            'data' => []
        ], 200);
    }
}
