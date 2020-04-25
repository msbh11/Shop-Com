@extends('admin.master')
@section('body')
<br/>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                 <h4 class="text-center text-success" id="xyz">Customer For This Order</h4>
            </div>
            <div class="panel-body">
            <h3 class="text-center text-success" id='xyz'> {{ Session :: get('message') }} </h3>
                <table class="table table-bordered">
                    <tr>
                        <th>Customer Name</th>
                        <td>{{$customer->first_name.' '.$customer->last_name}}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <th>{{$customer->phone_number}}</th>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <th>{{$customer->email_address}}</th>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <th>{{$customer->address}}</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                 <h4 class="text-center text-success" id="xyz">Shipping Info For This Order</h4>
            </div>
            <div class="panel-body">
            <h3 class="text-center text-success" id='xyz'> {{ Session :: get('message') }} </h3>
                <table class="table table-bordered">
                    <tr>
                        <th>Full Name</th>
                        <td>{{ $shipping->full_name}}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <th>{{$shipping->phone_number}}</th>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <th>{{$shipping->email_address}}</th>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <th>{{$shipping->address}}</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                 <h4 class="text-center text-success" id="xyz">Payment Info For This Order</h4>
            </div>
            <div class="panel-body">
            <h3 class="text-center text-success" id='xyz'> {{ Session :: get('message') }} </h3>
                <table class="table table-bordered">
                    <tr>
                        <th>Payment Type</th>
                        <td>{{$payment->payment_type}}</td>
                    </tr>
                    <tr>
                        <th>Payment Status</th>
                        <td>{{$payment->payment_status}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                 <h4 class="text-center text-success" id="xyz">Product Info For This Order</h4>
            </div>
            <div class="panel-body">
            <h3 class="text-center text-success" id='xyz'> {{ Session :: get('message') }} </h3>
                <table class="table table-bordered">
                     <tr class="bg-primary">
                        <th> Sl No </th>
                        <th> Product Id </th>
                        <th> Product Name </th>
                        <th> Product Price </th>
                        <th> Product Quantity </th>
                        <th> Total Price </th>
                     </tr>
                     @php($i=1)
                     @foreach($orderDetails as $order)
                     <tr>
                        <td>{{$i++}}</td>
                        <td>{{$order->product_id}}</td>
                        <td>{{$order->product_name}}</td>
                        <td>{{$order->product_price}}</td>
                        <td>{{$order->product_quantity}}</td>
                        <td>{{$order->product_price*$order->product_quantity}}</td>
                     </tr>
                     @endforeach
                    </table>

            </div>
        </div>
    </div>
</div>
@endsection