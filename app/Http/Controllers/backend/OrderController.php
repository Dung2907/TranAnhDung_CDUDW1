<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Order::where('order.status', '!=', 0)
            ->join('user', 'order.user_id', '=', 'user.id')
            ->select(
                "order.id",
                "order.delivery_name",
                "user.name as username",
                "order.delivery_email",
                "order.delivery_phone",
                "order.delivery_address",
                "order.note",
                "order.status"
            )
            ->orderBy('order.created_at', 'desc')
            ->get();
        return  view("backend.order.index", compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = User::where('status', '!=', 0)
            ->select(
                "id",
                "name",
            )
            ->get();
        $list_user = "";
        foreach ($list as $items) {
            $list_user .= "<option value='$items->id'>" . $items->name . "</option>";
        }

        return  view("backend.order.create", compact('list_user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    { {

            $order = new Order();
            $order->delivery_name = $request->delivery_name;
            $order->user_id = $request->user_id;
            $order->delivery_email = $request->delivery_email;
            $order->delivery_phone = $request->delivery_phone;
            $order->delivery_gender = "now";
            $order->delivery_address = $request->delivery_address;
            $order->note = $request->note;
            $order->type = "online";
            $order->status = $request->status;
            $order->created_at = date('Y-m-d-H:i:s');
            $order->save();
            // Chuyển hướng trang
            return redirect()->route('admin.order.index')->with('success', 'order đã được tạo thành công.');
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
