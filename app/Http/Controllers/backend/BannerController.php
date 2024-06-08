<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Banner::where('status', '!=', 0)
            ->select(
                "id",
                "name",
                "link",
                "position",
                "description"
            )
            ->orderBy('created_at', 'desc')
            ->get();
        return  view("backend.banner.index", compact('list'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view("backend.banner.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        // Thêm vào CSDL
        // Thêm mới banner
        $banner = new banner();
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->position = $request->position;
        $banner->description = $request->description;
        // Upload image
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->extension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp'])) {
                $filename = $banner->slug . "." . $extension;
                $request->image->move(public_path("images/banner"), $filename);
                $banner->image = $filename;
            }
        }
        // end Upload
        $banner->status = $request->status;
        $banner->created_at = date('Y-m-d-H:i:s');
        $banner->created_by = Auth::id() ?? 1;
        $banner->save();
        // Chuyển hướng trang
        return redirect()->route('admin.banner.index')->with('success', 'Banner đã được tạo thành công.');
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
