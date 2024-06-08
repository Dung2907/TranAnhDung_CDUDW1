<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuRequest;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Menu::where('status', '!=', 0)
            ->select(
                "id",
                "name",
                "link",
                "position",
                "type"

            )
            ->orderBy('created_at', 'desc')
            ->get();
        $list_category = Category::where('status', '!=', 0)->get();
        $list_brand = Brand::where('status', '!=', 0)->get();
        $list_topic = Topic::where('status', '!=', 0)->get();
        $list_post = Post::where([['status', '!=', 0], ['type', '=', 'page']])->get();
        return  view("backend.menu.index", compact('list', 'list_category', 'list_brand', 'list_topic', 'list_post'));
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
        $position = $request->input('position');
        if ($request->has('ADDCATEGORY')) {
            if (!is_null($request->input('CategoryId'))) {
                $list_id = $request->input('CategoryId');
                foreach ($list_id as $id) {
                    $category = Category::find($id);
                    $menu = new Menu();
                    $menu->name = $category->name;
                    $menu->link = $category->slug; //Thay đổi lúc sau
                    $menu->sort_order = 0;
                    $menu->table_id = $category->id;
                    $menu->type = 'category';
                    $menu->position = $position;
                    $menu->created_by = Auth::id() ?? 1; // Sử dụng id của user đăng nhập
                    $menu->status = 2; // Giả sử bạn có hằng số này
                    $menu->save();
                }
                return redirect()->route('admin.menu.index')->with('message', ['typemsg' => 'success', 'msg' => 'Thêm thành công']);
            } else {
                return redirect()->route('admin.menu.index')->with('message', ['typemsg' => 'danger', 'msg' => 'Chưa chọn danh mục sản phẩm']);
            }
        }
        if ($request->has('ADDBRAND')) {
            if (!is_null($request->input('BrandId'))) {
                $list_id = $request->input('BrandId');
                foreach ($list_id as $id) {
                    $brand = Brand::find($id);
                    $menu = new Menu();
                    $menu->name = $brand->name;
                    $menu->link = $brand->slug; //Thay đổi lúc sau
                    $menu->sort_order = 0;
                    $menu->table_id = $brand->id;
                    $menu->type = 'brand';
                    $menu->position = $position;
                    $menu->created_by =  Auth::id() ?? 1; // Sử dụng id của user đăng nhập
                    $menu->status = 2; // Giả sử bạn có hằng số này
                    $menu->save();
                }
                return redirect()->route('admin.menu.index')->with('message', ['typemsg' => 'success', 'msg' => 'Thêm thành công']);
            } else {
                return redirect()->route('admin.menu.index')->with('message', ['typemsg' => 'danger', 'msg' => 'Chưa chọn danh mục sản phẩm']);
            }
        }
        if ($request->has('ADDTOPIC')) {
            if (!is_null($request->input('TopicId'))) {
                $list_id = $request->input('TopicId');
                foreach ($list_id as $id) {
                    $topic = Topic::find($id);
                    $menu = new Menu();
                    $menu->name = $topic->name;
                    $menu->link = $topic->slug; //Thay đổi lúc sau
                    $menu->sort_order = 0;
                    $menu->table_id = $topic->id;
                    $menu->type = 'topic';
                    $menu->position = $position;
                    $menu->created_by =  Auth::id() ?? 1; // Sử dụng id của user đăng nhập
                    $menu->status = 2;
                    $menu->save();
                }
                return redirect()->route('admin.menu.index')->with('message', ['typemsg' => 'success', 'msg' => 'Thêm thành công']);
            } else {
                return redirect()->route('admin.menu.index')->with('message', ['typemsg' => 'danger', 'msg' => 'Chưa chọn danh mục sản phẩm']);
            }
        }
        if ($request->has('ADDPOST')) {
            if (!is_null($request->input('PostId'))) {
                $list_id = $request->input('PostId');
                foreach ($list_id as $id) {
                    $post = Post::find($id);
                    $menu = new Menu();
                    $menu->name = $post->title;
                    $menu->link = $post->slug; //Thay đổi lúc sau
                    $menu->sort_order = 0;
                    $menu->table_id = $post->id;
                    $menu->type = 'postpage';
                    $menu->position = $position;
                    $menu->created_by =  Auth::id() ?? 1; // Sử dụng id của user đăng nhập
                    $menu->status = 2; // Giả sử bạn có hằng số này
                    $menu->save();
                }
                return redirect()->route('admin.menu.index')->with('message', ['typemsg' => 'success', 'msg' => 'Thêm thành công']);
            } else {
                return redirect()->route('admin.menu.index')->with('message', ['typemsg' => 'danger', 'msg' => 'Chưa chọn danh mục sản phẩm']);
            }
        }
        if ($request->has('ADDCUSTOM')) {
            if (!is_null($request->input('name', 'link'))) {
                $menu = new Menu();
                $menu->name = $request->name;
                $menu->link = $request->link; //Thay đổi lúc sau
                $menu->sort_order = 0;
                $menu->table_id = 0;
                $menu->type = 'custom';
                $menu->position = $position;
                $menu->created_by =  Auth::id() ?? 1; // Sử dụng id của user đăng nhập
                $menu->status = 2; // Giả sử bạn có hằng số này
                $menu->save();
                return redirect()->route('admin.menu.index')->with('success', ' Ddã được tạo thành công.');
            } else {
                return redirect()->route('admin.menu.index')->with('message', ['typemsg' => 'danger', 'msg' => 'Chưa chọn danh mục sản phẩm']);
            }
        }
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
