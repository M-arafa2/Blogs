<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use League\CommonMark\Node\Query\OrExpr;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::when(request()->status, function ($q) {
            $q->where('status', 'pending');
        })->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Order $order)
    {
        if ($order->files) {
            $files = json_decode($order->files, true);
            foreach ($files as $index => $file) {
                delete_file($file);
            }
        }

        $order->delete();
        return back()->with('success', trans('تم حذف الطلب بنجاح'));
    }

    public function accept($id)
    {
        $order = Order::find($id);
        $order->update(['status' => 'accepted']);
        return back()->with('success', trans('تم قبول الطلب بنجاح'));
    }

    public function reject(Request $request, $id)
    {
        $order = Order::find($id);

        $request->validate(['rejected_reason' => 'required']);

        $order->update(['status' => 'rejected', 'rejected_reason' => $request->rejected_reason]);

        return back()->with('success', trans('تم رفض الطلب بنجاح'));
    }
}
