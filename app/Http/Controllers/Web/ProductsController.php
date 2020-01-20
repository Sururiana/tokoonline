<?php

namespace App\Http\Controllers\Web;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ImagesProduct;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.master.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            //menyimpan data produk
            $product = Product :: create([
                //kolom-ditabel => inputan-user
                "product"=> $request ->product,
                "price"=> $request ->price,
                "stock"=> $request ->stock,
                "description"=> $request ->description,
            ]);
            //menyimpan-images
            if ($request->hasFile('images')) {
                $arrayImage = [];
                foreach ($request->images as $value) {
                    $path = $value -> store ('product');

                    $columnsImage = [
                        "product_id" => $product -> id,
                        "image" => $path,
                    ];

                    array_push($arrayImage,$columnsImage);
                }
                ImagesProduct::insert($arrayImage);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
        return redirect() -> route("product.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with(['imageRelation'])->find($id);
        return view('admin.master.product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.master.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $oldimages = ImagesProduct::where('product_id', $id)->get();

        DB::beginTransaction();

        try {
            //mengubah data produk
            $product->update([
                //kolom-ditabel => inputan-user
                "product"=> $request ->product,
                "price"=> $request ->price,
                "stock"=> $request ->stock,
                "description"=> $request ->description,
            ]);
            //menyimpan-images
            if ($request->hasFile('images')) {
                if ( count( $oldimages) >= 0 ) {
                    foreach ($oldimages as $old) {
                        Storage::delete($old->image);
                    }
                    ImagesProduct::where('product_id', $id)->delete();
                }
                $arrayImage = [];
                foreach ($request->images as $value) {
                    $path = $value -> store ('product');

                    $columnsImage = [
                        "product_id" => $product -> id,
                        "image" => $path,
                    ];

                    array_push($arrayImage,$columnsImage);
                }
                ImagesProduct::insert($arrayImage);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
        return redirect() -> route("product.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ( !$product ) {
            abort(404);
        }
        $oldimages = ImagesProduct::where('product_id', $id)->get();
        if ( count( $oldimages) >= 0 ) {
            foreach ($oldimages as $old) {
                Storage::delete($old->image);
            }
            ImagesProduct::where('product_id', $id)->delete();
        }

        $product->delete();

        return redirect()->route("product.index");

    }
}
