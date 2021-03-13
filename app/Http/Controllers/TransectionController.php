<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransectionController extends Controller
{
    //

    public function addTransection(request $request)
    {

        $product_id = $request->product_id;
        $name_id = $request->name_id;
        $qty = $request->qty;
        $date = $request->date;

        $transection = new Transection();
        $transection->product_id = $product_id;
        $transection->name_id = $name_id;
        $transection->qty = $qty;
        $transection->date = $date;
        $transection->status = 'up';
        $transection->save();

        $product = Product::find($product_id);
        $product->qty = $product->qty + $qty;
        // $product->qty +=$qty;
        $product->save();


        return response()->json([
            'message' => 'เพิ่มสินค้าสำเร็จ',
            'date' => $transection,

        ], 200);
    }

    public function deleteTransection(request $request)
    {

        $product_id = $request->product_id;
        $name_id = $request->name_id;
        $qty = $request->qty;
        $remark = $request->remark;
        $date = $request->date;

        $transection = new Transection();
        $transection->product_id = $product_id;
        $transection->name_id = $name_id;
        $transection->qty = $qty;
        $transection->date = $date;
        $transection->remark = $remark;
        $transection->status = 'down';
        $transection->save();

        $product = Product::find($product_id);
        $product->qty = $product->qty - $qty;
        // $product->qty +=$qty;
        $product->save();

        return response()->json([
            'message' => 'ลดสินค้าสำเร็จ',
            'date' => $transection,

        ], 200);
    }

    public function showTransection(request $request)
    {
        $view = DB::table('view_report')->get();
        return $view;
    }
}
