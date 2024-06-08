<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Contact::where('contact.status', '!=', 0)
            ->join('user', 'contact.user_id', '=', 'user.id')
            ->select(
                "contact.id",
                "contact.name",
                "user.name as username",
                "contact.email",
                "contact.phone",
                "contact.title",
                "contact.content",
                "contact.status"
            )
            ->orderBy('contact.created_at', 'desc')
            ->get();
        return  view("backend.contact.index", compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Contact::where('contact.status', '!=', 0)
            ->join('user', 'contact.user_id', '=', 'user.id')
            ->select(
                "contact.id",
                "contact.name",
                "user.name as username",
                "contact.email",
                "contact.phone",
                "contact.title",
                "contact.content",
                "contact.status"
            )
            ->orderBy('contact.created_at', 'desc')
            ->get();
        $user_id = "";
        foreach ($list as $items) {
            $user_id .= "<option value='$items->id'>" . $items->name . "</option>";
        }
        return  view("backend.contact.create", compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function  store(StoreContactRequest $request)
    {
        // Thêm vào CSDL
        // Thêm mới contact
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->user_id = $request->user_id;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->replay_id = $request->replay_id;
        $contact->status = $request->status;
        $contact->created_at = date('Y-m-d-H:i:s');
        $contact->save();
        // Chuyển hướng trang
        return redirect()->route('admin.contact.index')->with('success', 'Contact đã được tạo thành công.');
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
