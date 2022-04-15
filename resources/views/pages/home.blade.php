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

    <section class="whychoose">
        <h3 class="text-center mb-5 text-white"><b>Why Choose VARAN?</b></h3>
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
    <section class="videoslider">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel mt-4">
                        <div>
                            <div class="videocontainer">
                                <iframe width="360" height="315" style="border-radius:10px;" src="https://www.youtube-nocookie.com/embed/e-1EV6amJQU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="videocontainer">
                            <iframe width="360" height="315" style="border-radius:10px;" src="https://www.youtube-nocookie.com/embed/e-1EV6amJQU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="videocontainer">
                            <iframe width="360" height="315" style="border-radius:10px;" src="https://www.youtube-nocookie.com/embed/e-1EV6amJQU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                  </div>
                </div>
            </div>
        </div>

    </section>
    <section class="slider-section mt-5">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                <h3 class="text-center">Matrimony Service with Millions of Success Stories</h3>
                    <p class="text-center">Varan Matrimony have helped lakhs of people find their perfect partner and perfect families. Because at Varan Matrimony, we believe that a marriage is not about just two persons but about two families too. Varan Matrimony helps you find your right partner and family who match your community, interests and preferences through its personalized search assistance.</p>
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
    <section class="storydetails">
        <h1 class="text-center">Your Story is waiting to happen!</h1>
    </section>

    <section class="faqsection">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 style="font-weight:bold">FAQ</h3>
                    <div class="accordion mt-4" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne" >
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color:#cf97a2;color:#fff;font-weight:bold">
                                What is Varan Matimony Personalised Matchmaking services?
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>You are provided with a Personal Matchmaker, who will do an expert search, identify, short-list and contact prospective life partners on your behalf to help you find your life partner. Your Personal Matchmaker also tracks responses, monitors matching profiles and keeps you informed on developments related to matchmaking on a regular basis. Your Personal Matchmaker will understand all your needs in your life partner search. There are Personal Matchmakers based in India and their services are also extended to members across the globe.</p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background-color:#cf97a2;color:#fff;font-weight:bold">
                                Is online payment secure?
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <p>Yes! It is secure to make online payments. Our payment gateway provider adopts the SSL (Secured Socket Layer) technology, an internationally proven widely accepted technology. Our payment gateway service providers ensure that your credit card details are kept secure while transacting on the net, preventing unauthorised access.</p>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="background-color:#cf97a2;color:#fff;font-weight:bold">
                                What is Matrimony ID?
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <p>A Matrimony ID is a unique combination of an alphabet and a six-or seven-digit number (e.g. VV1001To identify you uniquely, a Matrimony ID is assigned to you when you register with us. This Matrimony ID is to be referred in all correspondences with Vara2Varan.com                            </p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sponserdetails">
        <div class="container">
            <h1 class="text-center">Our Vendors</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel mt-4">
                        <div class="sponsercontainer">
                            <img src="../assets/images/varanlogo2.png" class="img-fluid" style="width:200px">
                        </div>
                        <div class="sponsercontainer">
                            <img src="../assets/images/varanlogo2.png" class="img-fluid" style="width:200px">
                        </div>
                        <div class="sponsercontainer">
                            <img src="../assets/images/varanlogo2.png" class="img-fluid" style="width:200px">
                        </div>
                  </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonialsection" style="border-top:1px solid #fff">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div id="carouselExampleControls2" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="../assets/images/testimonial.png" class="img-fluid">
                                    </div>
                                    <div class="col-lg-8">
                                        <h4 class="text-white mt-5"><b>Santosh Kumar weds Sristy Kumari</b></h4>
                                        <p style="color:#fff;text-align:justify">We met the first time in a cafe, being in my hometown i could only talk to him for 2 hours and 4 months we had a long distance thing, we talked and talked, and had the best conversation! It doesn’t feel like arranged marriage anymore and we both love each other :)                                        </p>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="../assets/images/testimonial.png" class="img-fluid">
                                    </div>
                                    <div class="col-lg-8">
                                        <h4 class="text-white mt-5"><b>Atanu Shome weds Aditi Dutta                                        </b></h4>
                                        <p style="color:#fff;text-align:justify">We started interacting on 14th april 2021 and we both never imagined that by this year we will be already married . Thanks to the JS team                                        </p>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="../assets/images/testimonial.png" class="img-fluid">
                                    </div>
                                    <div class="col-lg-8">
                                        <h4 class="text-white mt-5"><b>Shashank Maurya weds Sweta Singh</b></h4>
                                        <p style="color:#fff;text-align:justify">I heard a lot about JS from my friends and I found all the good words come true. The platform has few amazing features - detailed bio description, concrete relevant personal information of the users. This helped in narrowing down my search for my desired partner. </p>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
            </div>
        </div>
    </section>
    </section>
@endsection
