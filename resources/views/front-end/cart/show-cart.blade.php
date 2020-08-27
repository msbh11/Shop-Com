@extends('front-end.master')
@section('body')
    <div class="banner1">
        <div class="container">
            <h3><a href="{{route ('shop') }}">Home</a> / <span>Add To Cart</span></h3>
        </div>
    </div>
    <!--banner-->

    <!--content-->
    <div class="content">
        <!--single-->
        <div class="single-wl3">
            <div class="container">
                <div class="row">
                    <div class="col-md-11 col-md-offset-1">
                        <h3 class="text-center text-success">My Shopping cart</h3>
                        <hr/>
                        <table class="table table-bordered">
                            <tr class="bg-primary text-center">
                                <th>SL No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price TK. </th>
                                <th>Quantity</th>
                                <th>Total Price TK. </th>
                                <th>Action</th>
                            </tr>
                            @php($i = 1)
                            @php($sum = 0)
                            @foreach($cartProducts as $cartProduct)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $cartProduct->name }}</td>
                                <td><img src="{{ asset($cartProduct->options->image) }}" alt="" height="50" width="50"/> </td>
                                <td>{{ $cartProduct->price }}</td>
                                <td>
                                    <form action = "{{ route('update-cart') }}" method="POST" >
                                    @csrf
                                        <input type="number" name="qty" value="{{ $cartProduct->qty }}" min="1"/>
                                        <input type="hidden" name="rowId" value="{{ $cartProduct->rowId }}" />
                                        <input type="submit" name="btn" value="Update"/>
                                    </form>
                                                      
                                </td>
                                <td>{{ $total = $cartProduct->price*$cartProduct->qty  }}</td>
                                <td>
                                    <a href="{{ route('delete-cart', ['rowId'=>$cartProduct->rowId]) }}" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                             <?php $sum = $sum+$total; ?>
                            @endforeach
                        </table>
                        <hr/>
                        <table class="table table-bordered">
                            <tr>
                                <th>Item Total (TK. )</th>
                                <td>{{ $sum }}</td>
                            </tr>
                            <tr>
                                <th>Vat Total (TK. )</th>
                                <td>{{ $vat = 0 }}</td>
                            </tr>
                            <tr>
                                <th>Grand Total (TK. )</th>
                                <td>{{ $orderTotal = $sum+$vat }}</td>
                                <?php
                                    Session::put('orderTotal', $orderTotal);
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11 col-md-offset-1">
                        @if(Session::get('customerId') && Session::get('shippingId'))
                            <a href="{{ route('checkout-payment') }}" class="btn btn-success pull-right">Checkout</a>
                        @elseif(Session::get('customerId'))
                            <a href="{{ route('checkout-shipping') }}" class="btn btn-success pull-right">Checkout</a>
                        @else
                            <a href="{{ route('signup-customer') }}" class="btn btn-success pull-right">Checkout</a>
                        @endif
                        <a href="{{route('shop')}}" class="btn btn-success">Continue shopping</a>
                    </div>
                </div>
            </div>
        </div>
        <!--single-->
        <!--new-arrivals-->
    </div>
@endsection