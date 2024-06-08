<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Topic::where('status', '!=', 0)
            ->select(
                "id",
                "name",
                "slug",
                "sort_order",
                "description"
            )
            ->orderBy('created_at', 'desc')
            ->get();
        $htmlsortorder = "";
        foreach ($list as $items) {
            $htmlsortorder .= "<option value='$items->id'>" . $items->name . "</option>";
        }
        return  view("backend.topic.index", compact('list', 'htmlsortorder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        $topic = new topic();
        $topic->name = $request->name;
        $topic->slug = Str::of($topic->name)->slug('-');
        $topic->sort_order = $request->sort_order;
        $topic->description = $request->description;
        $topic->status = $request->status;
        $topic->created_at = date('Y-m-d-H:i:s');
        $topic->created_by = Auth::id() ?? 1;
        $topic->save();
        // Chuyển hướng trang
        return redirect()->route('admin.topic.index')->with('success', 'topic đã được tạo thành công.');
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
