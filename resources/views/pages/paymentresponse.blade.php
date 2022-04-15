@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')



    <section class="register-section">

        @if(session()->get('success'))

        <div class="container">
            <div class="register-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="paymentsuccess">
                            <img src="images/check_mark.png" class="img-fluid m-auto d-block" style="width:250px">
                            <h3 class="text-center">Payment Successfully...</h3>
                            <a href="/myprofile" class="btn btn-success" style="width:100%;margin-top:25px;">Goto Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="container">
            <div class="register-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="paymentsuccess">
                            <img src="images/round-error-icon-16.jpg" class="img-fluid m-auto d-block" style="width:250px">
                            <h3 class="text-center">Payment Failed...</h3>
                            <a href="/package" class="btn btn-danger" style="width:100%;margin-top:25px;">Try Again</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>
@endsection


