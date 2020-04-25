@extends('front-end.master')

@section('body')

    <div class="container">
        <div class="row">
            <div class="col-md-12 well text-center text-success">
              Dear {{ Session::get('customerName') }}. You have to give us product shipping info to complete your valuable order. If your billing info & shipping info are same then just press on save shipping info button.
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-md-offset-2">
                <br/>
                <h3>Shipping Info goes here...</h3>
                <br/>
                <form action="{{route('new-shippping')}}" method='POST'>
                    @csrf
                <div class="form-group">
                    <input type="text" value="{{ $customer->first_name.' '.$customer->last_name }}" name="full_name" class="form-control " placeholder="First Name">
                </div>
                <div class="form-group">
                    <input type="email" value="{{ $customer->email_address }}" name="email_address" class="form-control " placeholder="example@gmail.com">
                </div>
                <div class="form-group">
                    <input type="text" value="{{ $customer->phone_number }}" name="phone_number" class="form-control " placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <textarea name="address" placeholder="Address" class="form-control">{{ $customer->address }}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="btn" class="form-control  btn btn-info" value="Save Shipping Info">
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection