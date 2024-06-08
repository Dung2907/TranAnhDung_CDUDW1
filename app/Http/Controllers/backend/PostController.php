<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Post::where('post.status', '!=', 0)
            ->join('topic', 'post.topic_id', '=', 'topic.id')
            ->select(
                "post.id",
                "post.image",
                "topic.name as topicname",
                "post.title",
                "post.detail",
                "post.type",
                "post.description",
                "post.status"
            )
            ->orderBy('post.created_at', 'desc')
            ->get();
        return  view("backend.post.index", compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Topic::where('status', '!=', 0)
            ->select(
                "id",
                "name",
            )
            ->get();
        $list_topic = "";
        foreach ($list as $items) {
            $list_topic .= "<option value='$items->id'>" . $items->name . "</option>";
        }

        return  view("backend.post.create", compact('list_topic'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // Thêm vào CSDL
        // Thêm mới post
        $post = new Post();
        $post->title =$request->title;
        $post->detail =$request->detail;
        $post->description =$request->description;
        $post->type = $request->type;
        $post->slug = Str::of($post->name)->slug('-');
        // Upload image
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->extension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp'])) {
                $filename = $post->slug . "." . $extension;
                $request->image->move(public_path("images/post"), $filename);
                $post->image = $filename;
            }
        }
        // end Upload
        $post->status = $request->status;
        $post->created_at = date('Y-m-d-H:i:s');
        $post->created_by = Auth::id() ?? 1;
        $post->save();
        // Chuyển hướng trang
        return redirect()->route('admin.post.index')->with('success', 'post đã được tạo thành công.');
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
