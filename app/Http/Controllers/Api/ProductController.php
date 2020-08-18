<?php

namespace App\Http\Controllers\Api;

use DB;
use Carbon\Carbon;
use Response;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function products(Request $request)
    {
        // $query = Product::with(['latestImage'])->select('*')->orderBy('product','asc');
        // if ($request->search != null) {
        //     $query->where('product','like','%'.$request->search.'%');
        // }

        $singleImage = DB::raw( " (select coalesce(image,null) from images_product
        where products.id = images_product.product_id order by images_product.id desc limit 1  ) as image " );

        $query = Product::select('*',$singleImage)->orderBy('product','asc');

            if($request->search != null){
                $query->where('product','like','%'.$request->search.'%');
            }

        $product = $query->paginate(15);

        if ($product->isEmpty()) {
            return Response::json(
            [
                'status' =>[
                    'code' => 404,
                    'description' => 'Data Not Found'
                ]
                ],404);
        }else {
            return(ProductResource::collection($product))->additional([
                'status' => [
                    'code' => 200,
                    'description' =>'OK'
                ]
            ]);
            response()->setStatusCode(200);
        }
    }

    public function product($id)
    {
        $product = Product::with('imageRelation')->where('id',$id)->first();
        if ($product == null) {
            return Response::json([
                'status' => [
                    'code' => 404,
                    'description' => 'Not Found'
                ]
                ],404);
        }else {
            return (new ProductResource($product))
            ->additional([
                'status' => [
                    'code' => 200,
                    'description' => 'OK'
                ]
            ])->response()->setStatusCode(200);
        }
        // return $product;
    }
}
