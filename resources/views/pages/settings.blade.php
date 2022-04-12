@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')

        <section class="myprofile-section" style="background-image:url('assets/images/mask_group.png');height:100vh;background-size:cover">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">


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
                    <div class="bg-overlay">
                    <div class="row">
                        @if(session()->get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session()->get('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        <div class="col-lg-6 ">
                            <div class="accountsetting">
                                <h5 class="text-center text-white mb-4">Account Settings</h5>
                                <button class="btn btn-default accountbtn"><img src="assets/images/hidemyprofile.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Hide My Profile</button><br>
                                <button class="btn btn-default accountbtn"><img src="assets/images/deletemyaccount.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Delete My Account</button><br>
                                <a href="/forgott" class="btn btn-default accountbtn"><img src="assets/images/changepassword.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Change My Password</a><br>
                                <a href="/logout" class="btn btn-default accountbtn"><img src="assets/images/logout.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Logout</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="accountsetting">
                                <h5 class="text-center text-white mb-4">Privacy Settings</h5>

                                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-default accountbtn"><img src="assets/images/picturesetting.png"  class="img-fluid">&nbsp;&nbsp;&nbsp;Photo Privacy ({{$images->privacy_type}})</button><br>
                                <button data-bs-toggle="modal" data-bs-target="#horoscopesetting" class="btn btn-default accountbtn"><img src="assets/images/horoscopesetting.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Horoscope Privacy ({{$horoscope->privacy_setting}})</button><br>

                                <button data-bs-toggle="modal" data-bs-target="#contactprivacy" class="btn btn-default accountbtn"><img src="assets/images/contactprivacy.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Contact Privacy&nbsp;&nbsp;&nbsp;({{$register->cprivacy_setting}}) </button><br>
                                <button data-bs-toggle="modal" data-bs-target="#bioprivacy" class="btn btn-default accountbtn"><img src="assets/images/biography.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Biography Privacy&nbsp;&nbsp;&nbsp;({{$register->bprivacy_setting}})</button>
                            </div>
                        </div>
                    </div>
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
