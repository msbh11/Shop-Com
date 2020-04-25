@extends('front-end.master')

@section('body')

<div class="container">
    <div class="row">
        <div class="col-md-12 well text-center text-success">
            Dear {{ Session::get('customerName') }}. You have to give us product payment method..
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2 well">
            <form action="{{route('new-order')}}" method='POST'>
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Cash On Delivery</th>
                            <td><input type="radio" name="payment_type" value="Cash"> Cash On Delivery</td>
                        </tr>
                        <tr>
                            <th>Paypal</th>
                            <td><input type="radio" name="payment_type" value="Paypal"> Paypal</td>
                        </tr>
                        <tr>
                            <th>BKash</th>
                            <td><input type="radio" name="payment_type" value="Bkash"> Bkash</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" name="btn" value="Confirm ORder"></td>
                        </tr>
                    </table>
            </form>       
        </div>
    </div>
    </div>

@endsection