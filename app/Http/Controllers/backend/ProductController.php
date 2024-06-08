<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        $list = Product::where('product.status', '!=', 0)
            ->join('category', 'product.category_id', '=', 'category.id')
            ->join('brand', 'product.brand_id', '=', 'brand.id')
            ->select(
                "product.id",
                "product.image",
                "product.name",
                "category.name as categoryname",
                "brand.name as brandname",
                "product.price",
                "product.status"
            )
            ->orderBy('product.created_at', 'desc')
            ->get();
        return view("backend.product.index", compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Category::where('status', '!=', 0)
            ->select(
                "id",
                "name",
            )
            ->get();
        $list_category = "";
        foreach ($list as $items) {
            $list_category .= "<option value='$items->id'>" . $items->name . "</option>";
        }
        $list = Brand::where('status', '!=', 0)
            ->select(
                "id",
                "name",
            )
            ->get();
        $list_brand = "";
        foreach ($list as $items) {
            $list_brand .= "<option value='$items->id'>" . $items->name . "</option>";
        }

        return view("backend.product.create", compact('list_category', 'list_brand'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // Thêm vào CSDL
        // Thêm mới product
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::of($product->name)->slug('-');
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->description = $request->description;
        // Upload image
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->extension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp'])) {
                $filename = $product->slug . "." . $extension;
                $request->image->move(public_path("images/product"), $filename);
                $product->image = $filename;
            }
        }
        // end Upload
        $product->status = $request->status;
        $product->created_at = date('Y-m-d-H:i:s');
        $product->created_by = Auth::id() ?? 1;
        $product->save();
        // Chuyển hướng trang
        return redirect()->route('admin.product.index')->with('success', 'product đã được tạo thành công.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
