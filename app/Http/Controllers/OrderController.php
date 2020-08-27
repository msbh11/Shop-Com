<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Order;
use App\Customer;
use App\Shipping;
use App\OrderDetail;
use App\Payment;


class OrderController extends Controller
{
    public function manageOrderInfo()
    {

        $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->join('payments', 'orders.id', '=', 'payments.id')
            ->select('orders.*', 'customers.first_name', 'customers.last_name', 'payments.payment_type', 'payments.payment_status')
            ->get();

        return view('admin.order.manage-order', ['orders'=>$orders] );
    }
    

    public function viewOrderDetail($id){
        $order = Order::find($id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $orderDetails = OrderDetail::where('order_id', $order->id)->get();
        $payment = Payment::where('order_id' , $order->id)->first();
        return view('admin.order.view_order_details',[
            'order' => $order,
            'customer' => $customer,
            'shipping' => $shipping,
            'orderDetails' => $orderDetails,
            'payment' => $payment
        ]);
    }

    public function ViewOrderInvoice($id){
            $order = Order::find($id);
            $customer = Customer::find($order->customer_id);
            $shipping = Shipping::find($order->shipping_id);
            $orderDetails = OrderDetail::where('order_id', $order->id)->get();
            $payment = Payment::where('order_id' , $order->id)->first();
        return view('admin.order.view-order-invoice',[
            'order' => $order,
            'customer' => $customer,
            'shipping' => $shipping,
            'orderDetails' => $orderDetails,
            'payment' => $payment

        ]);
    }

    public function DownloadOrderInvoice($id){
            $order = Order::find($id);
            $customer = Customer::find($order->customer_id);
            $shipping = Shipping::find($order->shipping_id);
            $orderDetails = OrderDetail::where('order_id', $order->id)->get();
            $payment = Payment::where('order_id' , $order->id)->first();

        $pdf = PDF::loadView('admin.order.download-invoice',[
            'order' => $order,
            'customer' => $customer,
            'shipping' => $shipping,
            'orderDetails' => $orderDetails,
            'payment' => $payment
        ]);
        return $pdf->stream('invoice.pdf');
    }

    public function updateOrderStatus($id){

        $order = Order::find($id);
        $payment = Payment::where('order_id', $order->id)->first();
        $payment->payment_status = 'paid';
        $payment->save();


        $data = $order->toArray();

        return redirect('/order/manage-order')->with('message', 'payment status updated');
    }

    public function deleteOrder($id){
        $order = Order::find($id);

        $order->delete();
        return redirect('/order/manage-order')->with('message', 'order cancel successfully');
    }




}
