<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
        text-align: right;
    }

    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>

</head>
<body>
<br/>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
        <div class="panel-body">
            <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                            <table>
                                <tr>
                                    <td class="title"><h3>Invoice</h3>

                                    </td>

                                    <td>
                                        Invoice #: 0000{{$order->id}}<br>
                                        Created: {{ $order->created_at }}<br>
                                        Due: {{ $order->order_total}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                        <h4>Shipping Info</h4>
                                {{ $shipping->full_name}}<br>
                                {{$shipping->address}}<br>

                            </td>
                            <td>
                            <h4>Billing Info</h4>
                            {{$customer->first_name.' '.$customer->last_name}}<br>
                            {{$customer->email_address}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
                    <tr class="total">
                <td>
                    Payment Method
                </td>

                <td>
                {{$payment->payment_type}} #
                </td>
            </tr>

            <tr >
                <td>
                {{$payment->payment_type}}<br><br><br>
                </td>

                <td>
                    {{ $order->order_total}}
                    <br><br><br>
                </td>
            </tr>

            <tr >
                <td>
                   <strong>Item</strong>
                </td>

                <td>
                    <strong>Price X Quantity</strong>
                </td>
                <td>

                </td>
            </tr>
                     @foreach($orderDetails as $orderDetail)
                     <tr>

                        <td>{{$orderDetail->product_name}} </td>
                        <td>{{$orderDetail->product_price}} X {{$orderDetail->product_quantity}} = {{$orderDetail->product_price*$orderDetail->product_quantity}} </td>
                        </tr>

                        @endforeach
                        <tr class="total">

            <td>
            <td><strong>Total</strong> : {{$order->order_total}}</td>
            </td>
        </tr>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
