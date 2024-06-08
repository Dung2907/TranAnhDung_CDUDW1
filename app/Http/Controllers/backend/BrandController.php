<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Brand::where('status', '!=', 0)
            ->select(
                "id",
                "name",
                "slug",
                "image",
                "description"
            )
            ->orderBy('created_at', 'desc')
            ->get();
        $htmlsortorder = "";
        foreach ($list as $items) {
            $htmlsortorder .= "<option value='$items->id'>Sau:" . $items->name . "</option>";
        }

        return  view("backend.brand.index", compact('list', 'htmlsortorder'));
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
    public function store(StoreBrandRequest $request)
    {
        // Thêm vào CSDL
        // Thêm mới brand

        $brand = new Brand();

        $brand->name = $request->name;
        $brand->slug = Str::of($brand->name)->slug('-');
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;

        // Upload image
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->extension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp'])) {
                $filename = $brand->slug . "." . $extension;
                $request->image->move(public_path("images/categories"), $filename);
                $brand->image = $filename;
            }
        }
        // end Upload

        $brand->status = $request->status;


        $brand->created_at = date('Y-m-d-H:i:s');

        $brand->created_by = Auth::id() ?? 1;
        $brand->save();
        // Chuyển hướng trang
        return redirect()->route('admin.brand.index')->with('success', 'Brand đã được tạo thành công.');
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
