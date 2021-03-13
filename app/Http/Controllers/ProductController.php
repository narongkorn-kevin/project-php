<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function inserProduct(request $request)
    {
        $reference = $request->reference;
        $description = $request->description;
        $brand = $request->brand;
        $qty = $request->qty;

        $product = new Product();
        $product->reference = $reference;
        $product->description = $description;
        $product->brand = $brand;
        $product->qty = $qty;
        $product->save();

        return response()->json([
            'message' => 'เพิ่มสินค้าสำเร็จ',
            'date' => $product,

        ], 201);
    }


    public function editProduct(request $request, $id){
        $reference = $request->reference;
        $description = $request->description;
        $brand = $request->brand;
        $qty = $request->qty;

        $product = Product::find($id);
        $product->reference = $reference;
        $product->description = $description;
        $product->brand = $brand;
        $product->qty = $qty;
        $product->save();

        return response()->json([
            'message' => 'แก้ไข',
            'date' => $product,

        ], 200);

    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json([
            'message' => 'ลบสินค้าสำเร็จ',
            'data' => '',
        ], 200);
    }

    public function getProduct()
    {
        $product = Product::all();

        return response()->json([
            'message' => 'แสดงรายการสินค้าสำเร็จ',
            'data' => $product,
        ], 200);
    }

}
