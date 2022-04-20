@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')

    <section class="register-section">

            <div class="container">
                <div class="register-inner">
                <div class="row">
                    <div class="col-lg-4 " >
                        <img src="assets/images/image 4.png" class="img-fluid otp-image" style="padding:0px;margin-top:10px;border-radius:50px 0px 0px 50px;width:100%;height:380px">
                    </div>
                    <div class="col-lg-8 ">
                        <div class="form-container">
                            <div class="container">
                               <h3 class="text-center text-white">Verify Your Phone number</h3>
                                <p class="text-center text-white">To proceed further on VARAN, Verify your phone number</p>

                                <p class="text-center text-white">Code is Send to {{$mblnum}}</p>
                                <form method="POST" action="/otpcheck">
                                    @csrf
                                <div class="textbox">
                                    <input type="text" name="otp1" class="form-control form-design-2 text-center" style="font-size:35px;width:70px;margin-right:10px;text-align:center" maxlength="1">
                                    <input type="text" name="otp2" class="form-control form-design-2" style="font-size:35px;width:70px;margin-right:10px;text-align:center" maxlength="1">
                                    <input type="text" name="otp3" class="form-control form-design-2" style="font-size:35px;width:70px;margin-right:10px;text-align:center" maxlength="1">
                                    <input type="text" name="otp4" class="form-control form-design-2" style="font-size:35px;width:70px;margin-right:10px;text-align:center" maxlength="1">
                                </div>
                                <p class="text-center text-white mt-4">Don't received code send again</p>
                                <p class="text-center text-white">OTP Code Valid in <span id="count"></span></p>
                                <p class="text-center text-danger" id="expired">OTP Time Expired</p>
                                    <input type="hidden" name="lookingfor" value="{{$lookingfor}}">
                                    <input type="hidden" name="createdby" value="{{$createdby}}">
                                    <input type="hidden" name="gender" value="{{$gender}}">
                                    <input type="hidden" name="name" value="{{$name}}">
                                    <input type="hidden" name="dob" value="{{$dob}}">
                                    <input type="hidden" name="email" value="{{$email}}">
                                    <input type="hidden" name="mblnum" value="{{$mblnum}}">
                                    <input type="hidden" name="montongue" value="{{$montongue}}">
                                    <input type="hidden" name="religion" value="{{$religion}}">
                                    <input type="hidden" name="caste" value="{{$caste}}">
                                    <input type="hidden" name="subcaste" value="{{$subcaste}}">
                                    <input type="hidden" name="countrycode" value="{{$countrycode}}">
                                    <input type="hidden" name="password" value="{{$password}}">
                                <div class="row mt-3">
                                    <button type="submit" class="btn btn-default btnstyle otpbtn" style="margin:15px auto;display:block;width:250px;background-image: linear-gradient(to right, #98803b 0%, #98803b 41%, #b69972 100%);">Verify and Create Account</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

