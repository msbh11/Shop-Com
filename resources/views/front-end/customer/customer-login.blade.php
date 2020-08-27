@extends('front-end.master')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .login-container {
            margin-top: 5%;
            margin-bottom: 5%;
        }


        .login-form-2 {
            padding: 5%;
            background: #0062cc;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        }

        .login-form-2 h3 {
            text-align: center;
            color: #fff;
        }

        .login-container form {
            padding: 5%;
        }

        .btnSubmit {
            width: 20%;
            border-radius: 1rem;
            padding: 1.5%;
            border: none;
            cursor: pointer;
        }
        .login-form-2 .btnSubmit {
            font-weight: 600;
            color: #0062cc;
            background-color: #fff;
        }
    </style>
@section('body')
    <div class="banner1">
        <div class="container">
            <h3><a href="{{ route('shop') }}">Home</a>/Login</h3>
        </div>
    </div>
    <!--banner-->

    <!--content-->
    <div class="content">
        <!--single-->
        <div class="single-wl3">
            <div class="container">
                <div class="row">
                
                        <div class="col-md-6 login-form-2">
                            <form action="{{route('customer-login')}}" method = "post">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email_address" class="form-control" placeholder="Your Email *" required/>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password"  class="form-control" placeholder="Your Password *" required/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit" value="Log-in" />
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