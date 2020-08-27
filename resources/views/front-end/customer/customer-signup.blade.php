@extends('front-end.master')
@section('body')
    <div class="banner1">
        <div class="container">
            <h3><a href="{{ route('shop') }}">Home</a>/SignUp</h3>
        </div>
    </div>
    <!--banner-->

    <!--content-->
    <div class="content">
        <!--single-->
        <div class="single-wl3">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 well">
                        <h3>Register if you are not Registered before!</h3>
                        <br/>
                        
                        <form action="{{route('customer-sign-up')}}" method="post" >
                        @csrf
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control " placeholder="First Name">
                        </div>

                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control " placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email_address" class="form-control " placeholder="example@gmail.com">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control " placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone_number" class="form-control " placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <textarea name="address" placeholder="Address" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn" class="form-control  btn btn-info" value="Register">
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!--single-->
        <!--new-arrivals-->
    </div>
@endsection