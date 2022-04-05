@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')

<section class="main-content">
    <section class="banner-section">
            <div class="banner-content">
                <div class="container ">
                    <div class="row">
                        <div class="inner-content">
                                <img src="assets/images/Group.png" class="img-fluid m-auto d-block">
                                <h3 class="text-center mt-3"><b>FIND YOUR PERFECT PARTNER</b></h3>
                                <p class="text-center mt-3"><b>We help you to find your perfect partner and perfect family</b></p>
                                <form method="POST" action="/postData">
                                    @csrf
                                <div class="row">

                                    <div class="col-3">
                                        <input type="text" class="form-control form-design name" name="name" placeholder="Name">
                                    </div>
                                    <div class="col-3">
                                        <select class="form-design form-control gender select2" style="background-color:#fff" name="gender">
                                               <option value="gender">Gender</option>
                                               <option value="Male">Male</option>
                                               <option value="Female">Female</option>
                                        </select>

                                    </div>
                                    <div class="col-3">
                                        <input type="number" class="form-control form-design pnumber" name="pnumber" placeholder="Mobile Number" >
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-default btnstyle registerbtn" style="width:150px;height:45px">REGISTER FREE</button>
                                    </div>


                                </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="whychoose mt-5">
        <h3 class="text-center mb-5"><b>Why Choose VARAN?</b></h3>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="assets/images/Group_2.png"  class="img-fluid m-auto d-block">
                </div>
                <div class="col-lg-4">
                    <img src="assets/images/Group_1.png" class="img-fluid m-auto d-block">
                </div>
                <div class="col-lg-4">
                    <img src="assets/images/Group_3.png" class="img-fluid m-auto d-block">
                </div>
            </div>
        </div>
    </section>

    <section class="slider-section mt-5">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                <h3 class="text-center">The Perfect matrimonial site for a perfect match</h3>
                    <p class="text-center">Varan Matrimony have helped lakhs of people find their perfect partner and perfect families. Because at m4marry, we believe that a marriage is not about just two persons but about two families too. Varan Matrimony helps you find your right partner and family who match your community, interests and preferences through its personalized search assistance.</p>
                </div>
                <div class="col-lg-12 mt-5">
                <div id="carouselExampleControls" class="carousel slide carouseldesign" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://i.ytimg.com/vi/KWvW8CQQ-7I/maxresdefault.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://i.ytimg.com/vi/jW-x0Hz6PEc/maxresdefault_live.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://i.ytimg.com/vi/CTwQgva2WtI/maxresdefault.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
        <a href="" class="btn btn-default btnstyle" style="margin:20px auto;display:block;width:250px;font-size:15px;background-image: linear-gradient(to right, #E3801D 0%, #E3801D 41%, #DA2A7B 100%);">REGISTER NOW</a>
                </div>
            </div>

            </div>
    </section>

    <section class="mobile-section mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="assets/images/mobil_app.png" class="img-fluid">
                </div>
                <div class="col-lg-2">
                    <img src="assets/images/android.png" class="img-fluid" style="margin-top:80px">
                    <img src="assets/images/ios.png" class="img-fluid mt-4">
                </div>
                <div class="col-lg-6">
                    <div style="margin-top:80px">
                        <h3 class="text-center" style="color:#6d1140;line-height:1.5"><b>EXPLORE VARAM MATRIMONY APP<br>ON YOUR SMART PHONES</b></h3>
                        <h5 class="text-center"><b>DOWNLOAD FREE MOBILE APP</b></h5>
                    </div>

                </div>
            </div>
        </div>
    </section>
    </section>
@endsection
