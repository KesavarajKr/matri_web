@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')

        <section class="myprofile-section" style="background-image:url('assets/images/mask_group.png');height:100vh;background-size:cover">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ">


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
                        <div class="col-lg-4 ">
                            <div class="accountsetting">
                                <h5 class="text-center text-white mb-4">Account Settings</h5>
                                <button data-bs-toggle="modal" data-bs-target="#hideprofile" class="btn btn-default accountbtn"><img src="assets/images/hidemyprofile.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Hide My Profile ({{$register->account_setting}})</button><br>
                                <button data-bs-toggle="modal" data-bs-target="#deleteprofile" class="btn btn-default accountbtn"><img src="assets/images/deletemyaccount.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Delete My Account ({{$register->delete_setting}})</button><br>
                                <a href="/forgott" class="btn btn-default accountbtn"><img src="assets/images/changepassword.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Change My Password</a><br>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="accountsetting">
                                <h5 class="text-center text-white mb-4">Privacy Settings</h5>

                                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-default accountbtn"><img src="assets/images/picturesetting.png"  class="img-fluid">&nbsp;&nbsp;&nbsp;Photo Privacy (
                                    @if($images)
                                        {{$images->privacy_type}}
                                        @else
                                        None
                                    @endif

                                    )</button><br>

                                <button data-bs-toggle="modal" data-bs-target="#horoscopesetting" class="btn btn-default accountbtn"><img src="assets/images/horoscopesetting.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Horoscope Privacy (
                                    @if($horoscope)
                                    {{$horoscope->privacy_setting}}
                                    @endif


                                    )</button><br>



                                <button data-bs-toggle="modal" data-bs-target="#contactprivacy" class="btn btn-default accountbtn"><img src="assets/images/contactprivacy.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Contact Privacy&nbsp;&nbsp;&nbsp;({{$register->cprivacy_setting}}) </button><br>
                                {{-- <button data-bs-toggle="modal" data-bs-target="#contactprivacy" class="btn btn-default accountbtn"><img src="assets/images/contactprivacy.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Privacy&nbsp;&nbsp;&nbsp;({{$register->cprivacy_setting}}) </button><br> --}}
                                {{-- <button data-bs-toggle="modal" data-bs-target="#bioprivacy" class="btn btn-default accountbtn"><img src="assets/images/biography.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Biography Privacy&nbsp;&nbsp;&nbsp;({{$register->bprivacy_setting}})</button> --}}
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="accountsetting">
                                <h5 class="text-center text-white mb-4">Privacy Settings</h5>

                                {{-- <button data-bs-toggle="modal" data-bs-target="#contactprivacy" class="btn btn-default accountbtn"><img src="assets/images/contactprivacy.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Contact Privacy&nbsp;&nbsp;&nbsp;({{$register->cprivacy_setting}}) </button><br> --}}
                                <button data-bs-toggle="modal" data-bs-target="#requestprivacy" class="btn btn-default accountbtn"><img src="assets/images/contactprivacy.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Request Privacy</button><br>
                                <button data-bs-toggle="modal" data-bs-target="#bioprivacy" class="btn btn-default accountbtn"><img src="assets/images/biography.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Biography Privacy&nbsp;&nbsp;&nbsp;({{$register->bprivacy_setting}})</button><br>
                                <a href="/logout" class="btn btn-default accountbtn"><img src="assets/images/logout.png" class="img-fluid">&nbsp;&nbsp;&nbsp;Logout</a>
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

  <div class="modal fade" id="hideprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Profile Hide</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-auto d-block">
            <form method="POST" action="/hideprofile">
                @csrf
                <input type="hidden" class="form-control" name="status" value="Hide">
                <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                <button type="submit" class="btn btn-primary" style="text-align:center;width:200px;background-color:#6d1140;border:0px">Hide</button>
              </form>
          <form method="POST" action="/hideprofile">
            @csrf
            <input type="hidden" class="form-control" name="status" value="View">
            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
            <button type="submit" class="btn btn-primary" style="width:200px;background-color:#6d1140;border:0px">Show</button>
          </form>

        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body m-auto d-block">
            <form method="POST" action="/deleteprofile">
                @csrf
                <input type="hidden" class="form-control" name="status" value="Pending">
                <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                <textarea style="height: 250px" class="form-control" name="deletereason" required placeholder="Delete Reason"></textarea>
                <button type="submit" class="btn btn-primary mt-3" style="text-align:center;width:200px;background-color:#6d1140;border:0px">Send Request</button>
              </form>


        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="requestprivacy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Varan ID</th>
                        <th class="text-center">Accept</th>
                        <th class="text-center">Reject</th>
                    </tr>
                </thead>
                <tbody>
                    @if($getrequest)
                        @foreach ($getrequest as $phnum)
                            <tr>
                                <td class="text-center">{{$phnum->partner_id}}</td>
                                <td class="text-center">
                                    <form method="POST" action="/acceptcontactview">
                                        @csrf
                                        <input type="hidden" name="requestid" value="{{$phnum->partner_id}}">
                                            @if($phnum->status == 1)
                                                <a class="btn btn-success btn-sm">Request Accepted</a>
                                                @else
                                                <button type="submit" class="btn btn-primary btn-sm">Accept</button>
                                            @endif

                                    </form>

                                </td>
                                <td class="text-center">
                                    <form method="POST" action="/rejectcontactview">
                                        @csrf
                                        <input type="hidden" name="requestid" value="{{$phnum->partner_id}}">
                                        @if($phnum->status == 2)
                                        <a class="btn btn-danger btn-sm">Request Rejected</a>
                                        @else
                                        <button type="submit" class="btn btn-primary btn-sm">Reject</button>
                                    @endif

                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

      </div>
    </div>
  </div>
