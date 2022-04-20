@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')

    <section class="register-section">

            <div class="container">
                <div class="register-inner">
                <div class="row">
                    <div class="col-lg-6 " >
                        <img src="http://www.behindwoods.com/tamil-movies/slideshow/tamil-cinema-celebrities-wedding-photos/images/keerthana-parthiepan.jpg" class="img-fluid vendorimg" style="padding:0px;margin-top:10px;border-radius:50px 0px 0px 50px;">
                    </div>
                    <div class="col-lg-6 ">
                        <div class="form-container">
                            <div class="container">
                               <h3 class="text-center text-white">Join Vendor</h3>
                                <p class="text-center text-white">Let’s get started now!</p>

                                @if(session()->get('success'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    {{session()->get('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                @endif
                                <form method="POST" action="{{route('vendor.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label style="color:#fff">Name</label>
                                        <input type="text" class="form-control mt-2 form-design-2" name="name" placeholder="Enter Name" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label style="color:#fff">E-mail</label>
                                        <input type="text" class="form-control mt-2 form-design-2" name="email" placeholder="Enter E-mail" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label style="color:#fff">Mobile Number</label>
                                        <input type="text" class="form-control mt-2 form-design-2" name="mblnum" placeholder="Enter Mobile Number" required maxlength="12">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label style="color:#fff" style="margin-bottom:20px">Vendor Type</label>
                                        <select class="form-control select2 form-design-2 vendortype" style="margin-top:20px" name="vendortype">
                                            <option value="">-- Choose vendor Type --</option>
                                            <option value="Broker">Match Maker</option>
                                            <option value="Catering">Catering</option>
                                            <option value="Bridal Makeup">Bridal Makeup</option>
                                            <option value="Mandabam">Mandabam</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3 vendorlogo">
                                        <label style="color:#fff">Vendor Logo</label>
                                        <input type="file" class="form-control mt-2 form-design-2" name="image" style="padding:9px 12px">
                                    </div>
                                    <div class="form-group mt-3 Password">
                                        <label style="color:#fff">Password</label>
                                        <input type="password" class="form-control mt-2 form-design-2" name="pwd" placeholder="Enter Password">
                                    </div>
                                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                                <div class="row mt-3">
                                    <button type="submit" class="btn btn-default btnstyle " style="margin:15px auto;display:block;width:250px;background-image: linear-gradient(to right, #98803b 0%, #98803b 41%, #b69972 100%);">Join Request</button>
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

