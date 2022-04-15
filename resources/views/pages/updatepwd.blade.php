@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')

    <section class="register-section">

            <div class="container">
                <div class="register-inner">
                <div class="row">
                    <div class="col-lg-6 " >
                        <img src="https://brnodaily.com/wp-content/uploads/2020/06/wedding-placing-rings-credit-freepik.jpg" class="img-fluid" style="padding:0px;margin-top:10px;border-radius:50px 0px 0px 50px">
                    </div>
                    <div class="col-lg-6 ">
                        <div class="form-container">
                            <div class="container">
                               <h3 class="text-center text-white">Update Password</h3>
                                <p class="text-center text-white">Login and find your life partner</p>

                                @if(session()->get('success'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session()->get('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                @endif
                                <form method="POST" action="/updatepassword">
                                    @csrf

                                    <h5 class="text-white">Your Mobile Number {{$mobilenum}}</h5>
                                    <input type="hidden" name="mblnum" value="{{$mobilenum}}">
                                    <div class="form-group mt-3">
                                        <label style="color:#fff">Password</label>
                                        <input type="password" class="form-control mt-2 form-design-2" name="pwd" placeholder="Enter Password" required>
                                    </div>

                                <div class="row mt-3">
                                    <button type="submit" class="btn btn-default btnstyle " style="margin:15px auto;display:block;width:250px;background-image: linear-gradient(to right, #98803b 0%, #98803b 41%, #b69972 100%);">Change Password</button>

                                </div>
                            </form>
                                <div class="text-center">
                                    <a href="" style="color:#fff;text-decoration:none">i have an already account</a><br>
                            <a href="/" style="color:#fff;text-decoration:none">Create New User</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

