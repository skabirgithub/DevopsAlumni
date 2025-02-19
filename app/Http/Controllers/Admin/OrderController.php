<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OrderDataTable;
use App\Http\Requests;
use App\Helpers\FileHelper;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use App\Http\Controllers\AppBaseController;
use Session;

class OrderController extends AppBaseController
{

    public function index(OrderDataTable $orderDataTable)
    {
        if (request()->ajax()) {
            return $orderDataTable->dataTableValue();
        }
        $dataTable = $orderDataTable->html();
        return  view('admin.orders.index',compact('dataTable'));
    }


    public function create()
    {
        return view('admin.orders.create');
    }


    public function store(OrderCreateRequest $request)
    {
        $input = $request->all();

        Order::create($input);  
        //$imageName = FileHelper::uploadImage($request);      
        //Order::create(array_merge($request->all(), ['image' => $imageName]));
        
        return back()->with('success','Order saved successfully.');
    }


    public function show($id)
    {
        $order = Order::find($id);

        if (empty($order)) {
            Session::flash('error','Order not found');

            return redirect(route('admin.orders.index'));
        }

        return view('admin.orders.show')->with('order', $order);
    }


    public function edit($id)
    {
        $order = Order::find($id);

        if (empty($order)) {
            Session::flash('error','Order not found');

            return redirect(route('admin.orders.index'));
        }

        return view('admin.orders.edit')->with('order', $order);
    }


    public function update($id, OrderUpdateRequest $request)
    {
        $order = Order::find($id);

        if (empty($order)) {
           Session::flash('error','Order not found');

            return redirect(route('admin.orders.index'));
        }

        // $imageName = FileHelper::uploadImage($request, $order);
        // $order->fill(array_merge($request->all(), ['image' => $imageName]));

        $order->fill($request->all());
        $order->save();

        Session::flash('success','Order updated successfully.');

        return redirect(route('admin.orders.index'));
    }


    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        //FileHelper::deleteImage($order);
        $order->delete();
    }
}
