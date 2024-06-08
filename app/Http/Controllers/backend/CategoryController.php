<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Category::where('status', '!=', 0)
            ->select(
                "category.id",
                "category.name",
                "category.slug",
                "category.image",
                "category.parent_id",
                "category.description",
                "category.status"
            )
            ->orderBy('created_at', 'desc')
            ->get();
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $items) {
            $htmlparentid .= "<option value='$items->id'>" . $items->name . "</option>";
            $htmlsortorder .= "<option value='$items->id'>Sau:" . $items->name . "</option>";
        }
        return  view("backend.category.index", compact('list', 'htmlparentid', 'htmlsortorder'));
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
    public function store(StoreCategoryRequest $request)
    {
        // Thêm vào CSDL
        // Thêm mới category

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::of($category->name)->slug('-');
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;

        // Upload image
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->extension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp'])) {
                $filename = $category->slug . "." . $extension;
                $request->image->move(public_path("images/categories"), $filename);
                $category->image = $filename;
            }
        }
        // end Upload

        $category->status = $request->status;


        $category->created_at = date('Y-m-d-H:i:s');

        $category->created_by = Auth::id() ?? 1;
        $category->save();
        // Chuyển hướng trang
        return redirect()->route('admin.category.index')->with('success', 'Category đã được tạo thành công.');
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
