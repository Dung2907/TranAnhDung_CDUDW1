<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = User::where('status', '!=', 0)
            ->select(
                "id",
                "name",
                "email",
                "phone",
                "username",
                "password",
                "address",
                "image",
                "roles"

            )
            ->orderBy('created_at', 'desc')
            ->get();
        return  view("backend.user.index", compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view("backend.user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new user();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->roles = $request->roles;
        $user->roles = $request->roles;
        $user->address = $request->address;
        // Upload image
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->extension();
            if (in_array($extension, ['jpg', 'png', 'gif', 'webp'])) {
                $filename = $user->slug . "." . $extension;
                $request->image->move(public_path("images/user"), $filename);
                $user->image = $filename;
            }
        }
        // end Upload
        $user->status = $request->status;
        $user->created_at = date('Y-m-d-H:i:s');
        $user->created_by = Auth::id() ?? 1;
        $user->save();
        // Chuyển hướng trang
        return redirect()->route('admin.user.index')->with('success', 'user đã được tạo thành công.');
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
