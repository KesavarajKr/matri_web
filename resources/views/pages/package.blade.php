@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')

        <section class="myprofile-section" style="background-image:url('assets/images/mask_group.png');background-size:cover;background-attachment:fixed;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

            <div class="container">
                <div class="register-inner" >
                    <div class="row">
                        <div class="col-lg-3">
                            <h5 class="text-center text-white"><img src="assets/images/instant_connect.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Instant Connect</h5>
                        </div>
                        <div class="col-lg-3">
                            <h5 class="text-center text-white"><img src="assets/images/unlimited_chating.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Unlimited Chating</h5>
                        </div>
                        <div class="col-lg-3">
                            <h5 class="text-center text-white"><img src="assets/images/happy_marriage.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Happy Marriage</h5>
                        </div>
                        <div class="col-lg-3">
                            <button class="btn btn-primary m-auto d-block w-100" style="color:#000;font-weight:bold;border:0px;border-radius:50px;background-image: linear-gradient(to right, #E2C887 0%, #E2C887 41%, #B98E44 100%) !important;">Upgrade Premium</button>
                        </div>
                    </div>
                    <div class="row" style="margin-top:70px">
                        @if($packages)
                            @foreach ($packages as $pack)
                                <div class="col-lg-4">
                                    <div class="bg-overlay">
                                        <div class="price-box">
                                            <h3 class="price-title">{{$pack->package_name}}</h3>
                                            <h3 class="price">₹{{$pack->package_price}} -/-</h3>
                                            <form method="POST" action="/userpaymentreq">
                                                @csrf
                                                <input type="hidden" class="form-control" name="appId" placeholder="Enter App ID here (Ex. 123456a7890bc123defg4567)" value="154027598f23c4090af1ab2dc2720451"/>

                                                    <input type="hidden" class="form-control" name="orderId" placeholder="Enter Order ID here (Ex. order00001)" value="Pack-{{$userpackagecount->count()+1}}"/>
                                                <input type="hidden" class="form-control" name="orderAmount" placeholder="Enter Order Amount here (Ex. 100)" value="{{$pack->package_price}}"/>
                                                <input type="hidden" class="form-control" name="orderCurrency" value="INR" placeholder="Enter Currency here (Ex. INR)"/>
                                                <input type="hidden" class="form-control" name="orderNote" placeholder="Enter Order Note here (Ex. Test order)" value="{{$pack->package_name}}"/>
                                                <input type="hidden" class="form-control" name="no_of_video" value="{{$pack->no_of_videos}}"/>
                                                <input type="hidden" class="form-control" name="no_of_image" value="{{$pack->no_of_images}}"/>
                                                <input type="hidden" class="form-control" name="no_of_phno" value="{{$pack->noofmblno}}"/>
                                                <input type="hidden" class="form-control" name="enable_chat" value="{{$pack->specification_3}}"/>
                                                <input type="hidden" class="form-control" name="enable_horoschope" value="{{$pack->specification_4}}"/>
                                                <input type="hidden" class="form-control" name="validity_date" value="{{$pack->validity}}"/>
                                                <input type="hidden" class="form-control" name="customerName" placeholder="Enter your name here (Ex. John Doe)" value="{{session('LoggedUser')}}"/>
                                                <input type="hidden" class="form-control" name="customerEmail" placeholder="Enter your email address here (Ex. Johndoe@test.com)" value="{{$userdetails->email_id}}"/>
                                                <input type="hidden" class="form-control" name="customerPhone" placeholder="Enter your phone number here (Ex. 9999999999)" value="{{$userdetails->mobile_no}}"/>
                                                <input type="hidden" class="form-control" name="notifyUrl" placeholder="" value="http://127.0.0.1:8000/paymentresponse"/>
                                                <input type="hidden" class="form-control" name="returnUrl" placeholder="Enter the URL to which customer will be redirected (Ex. www.example.com)" value="http://127.0.0.1:8000/redirectpage"/>
                                                <button class="btn btn-default mt-3" style="width:200px;color:#fff;font-weight:bold;border:0px;border-radius:50px;background-image: linear-gradient(to right, #E27B21 0%, #E27B21 41%, #DB3470 100%) !important;" value="Pay">Buy Now</button>
                                            </form>
                                        </div>
                                        <div class="price-description">
                                            <ul>
                                                <li><i class="bi bi-check-circle-fill"></i>{{$pack->no_of_videos}} Videos Upload</li>
                                                <li><i class="bi bi-check-circle-fill"></i>{{$pack->no_of_images}} Images Upload</li>
                                                <li><i class="bi bi-check-circle-fill"></i>{{$pack->validity}} Days Validity</li>
                                                <li><i class="bi bi-check-circle-fill"></i>Access {{$pack->noofmblno}} Mobile Numbers</li>
                                                @if($pack->specification_3 == "")
                                                        <li><i class="bi bi bi-x-circle-fill"></i>Unlimited Chat Option</li>
                                                    @else
                                                    <li><i class="bi bi-check-circle-fill"></i>Unlimited Chat Option</li>
                                                @endif
                                                @if($pack->specification_4 == "")
                                                        <li><i class="bi bi bi-x-circle-fill"></i>Horoscope View</li>
                                                    @else
                                                    <li><i class="bi bi-check-circle-fill"></i>Horoscope View</li>
                                                @endif
                                                @if($pack->specification_5 == "")
                                                        <li><i class="bi bi bi-x-circle-fill"></i>Text</li>
                                                    @else
                                                    <li><i class="bi bi-check-circle-fill"></i>Text</li>
                                                @endif
                                                @if($pack->specification_6 == "")
                                                        <li><i class="bi bi bi-x-circle-fill"></i>Specification 6</li>
                                                    @else
                                                    <li><i class="bi bi-check-circle-fill"></i>Specification 6</li>
                                                @endif
                                                @if($pack->specification_7 == "")
                                                        <li><i class="bi bi bi-x-circle-fill"></i>Specification 7</li>
                                                    @else
                                                    <li><i class="bi bi-check-circle-fill"></i>Specification 7</li>
                                                @endif
                                                @if($pack->specification_8 == "")
                                                        <li><i class="bi bi bi-x-circle-fill"></i>Specification 8</li>
                                                    @else
                                                    <li><i class="bi bi-check-circle-fill"></i>Specification 8</li>
                                                @endif
                                                @if($pack->specification_9 == "")
                                                        <li><i class="bi bi bi-x-circle-fill"></i>Specification 9</li>
                                                    @else
                                                    <li><i class="bi bi-check-circle-fill"></i>Specification 9</li>
                                                @endif
                                                @if($pack->specification_10 == "")
                                                        <li><i class="bi bi bi-x-circle-fill"></i>Specification 10</li>
                                                    @else
                                                    <li><i class="bi bi-check-circle-fill"></i>Specification 10</li>
                                                @endif


                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
    </section>
@endsection

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Photo Privacy</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-auto d-block">
            <form method="POST" action="/photoprivacy">
                @csrf
                <input type="hidden" class="form-control" name="status" value="All">
                <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                <button type="submit" class="btn btn-primary" style="text-align:center;width:200px;background-color:#6d1140;border:0px">All Users</button>
              </form>
          <form method="POST" action="/photoprivacy">
            @csrf
            <input type="hidden" class="form-control" name="status" value="Premium">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button class="btn btn-primary" style="width:200px;background-color:#6d1140;border:0px">Premium Users only</button>
          </form>
          <form method="POST" action="/photoprivacy">
            @csrf
            <input type="hidden" class="form-control" name="status" value="None">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button class="btn btn-danger" style="width:200px;background-color:#6d1140;border:0px">Hide</button>
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="horoscopesetting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Horoscope Privacy</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-auto d-block">
            <form method="POST" action="/horoscopeprivacy">
                @csrf
                <input type="hidden" class="form-control" name="status" value="All">
                <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                <button type="submit" class="btn btn-primary" style="text-align:center;width:200px;background-color:#6d1140;border:0px">All Users</button>
              </form>
          <form method="POST" action="/horoscopeprivacy">
            @csrf
            <input type="hidden" class="form-control" name="status" value="Premium">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button class="btn btn-primary" style="width:200px;background-color:#6d1140;border:0px">Premium Users only</button>
          </form>
          <form method="POST" action="/horoscopeprivacy">
            @csrf
            <input type="hidden" class="form-control" name="status" value="None">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button class="btn btn-danger" style="width:200px;background-color:#6d1140;border:0px">Hide</button>
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="contactprivacy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Contact Privacy</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-auto d-block">
            <form method="POST" action="/contactprivacy">
                @csrf
                <input type="hidden" class="form-control" name="status" value="All">
                <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                <button type="submit" class="btn btn-primary" style="text-align:center;width:200px;background-color:#6d1140;border:0px">All Users</button>
              </form>
          <form method="POST" action="/contactprivacy">
            @csrf
            <input type="hidden" class="form-control" name="status" value="Premium">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button type="submit" class="btn btn-primary" style="width:200px;background-color:#6d1140;border:0px">Premium Users only</button>
          </form>
          <form method="POST" action="/contactprivacy">
            @csrf
            <input type="hidden" class="form-control" name="status" value="None">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button type="submit" class="btn btn-danger" style="width:200px;background-color:#6d1140;border:0px">Hide</button>
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="bioprivacy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Biography Privacy</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-auto d-block">
            <form method="POST" action="/bioprivacy">
                @csrf
                <input type="hidden" class="form-control" name="status" value="All">
                <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                <button type="submit" class="btn btn-primary" style="text-align:center;width:200px;background-color:#6d1140;border:0px">All Users</button>
              </form>
          <form method="POST" action="/bioprivacy">
            @csrf
            <input type="hidden" class="form-control" name="status" value="Premium">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button type="submit" class="btn btn-primary" style="width:200px;background-color:#6d1140;border:0px">Premium Users only</button>
          </form>
          <form method="POST" action="/bioprivacy">
            @csrf
            <input type="hidden" class="form-control" name="status" value="None">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button type="submit" class="btn btn-danger" style="width:200px;background-color:#6d1140;border:0px">Hide</button>
          </form>
        </div>

      </div>
    </div>
  </div>
