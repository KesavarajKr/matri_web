@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')


        <section class="myprofile-section">

            <div class="container">
                <div class="register-inner">
                    <div class="row ">

                        <div class="col-lg-3 align-items-center text-center">
                            <div class="card profilebox">

                                    <div class="card-body">
                                        @if ($viewid->imageview == '0')
                                        <div class="profile-image-box">
                                            <img src="../images/{{$viewid->image_name}}" class="img-fluid m-auto d-block">
                                        </div>
                                            @else
                                            <div class="profile-image-box">
                                                <img src="../assets/images/imagelocked.png" class="img-fluid m-auto d-block">
                                            </div>
                                        @endif

                                        <div class="owl-carousel mt-4">
                                            @if ($viewid->imageview == '0')
                                                    @if($images)
                                                        @foreach ($images as $img)
                                                        <div>
                                                            <div class="profile-img-thumb">
                                                                <img src="../images/{{$img->image_name}}" class="img-fluid">
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    @endif
                                                @else
                                                <div class="profile-img-thumb">
                                                    <img src="../assets/images/imagelocked.png" class="img-fluid m-auto d-block">
                                                </div>
                                            @endif




                                          </div>
                                          {{-- <a href="/image" style="background-color:#6d1140;border:0px" class="btn btn-primary w-100 mt-3">Edit Image</a> --}}
                                    </div>
                              </div>
                              @if($horocount != '0')
                              <div class="card profilebox mt-2 matchesdetails" >
                                <div class="card-body">
                                    <h5 style="color:#6d1140"><b>Horoscope Matches</b></h5>
                                    <div class="matchbox">

                                        @if($horocount)
                                            <h3 class="text-center">{{$horocount->no_macths}}/12</h3>
                                            @else
                                            <h3 class="text-center">0/12</h3>
                                        @endif

                                    </div>
                                    @if($horocount->Status == 'Ok')
                                        <h6 class="text-success"><b><i class="bi bi-hand-thumbs-up-fill"></i>&nbsp;&nbsp;Matched</b></h6>
                                        @else
                                        <h6 class="text-danger"><b><i class="bi bi-hand-thumbs-up-fill"></i>&nbsp;&nbsp;Not Matched</b></h6>
                                    @endif
                                </div>
                          </div>
                            @else

                              @endif

                              <div class="card profilebox mt-2 matchesdetails" >
                                <div class="card-body">
                                    <h5 style="color:#6d1140"><b>Profile Matches</b></h5>
                                    <div class="matchbox">
                                        <h3 class="text-center">{{$int}}/100</h3>
                                    </div>
                                </div>
                          </div>
                              {{-- @dd($viewid); --}}
                        </div>
                        <div class="col-lg-9">
                            <div class="card profile-info">
                                <div class="card-body">
                                    <h3 class="profile-name" style="padding-left:20px">{{$viewid->Name}} &nbsp;
                                        @if($verifiedbadge->count() == 0)

                                            @else
                                            <i class="bi bi-shield-fill-check" style="color:green"></i><span style="font-size:15px;color:green">&nbsp;Verified by varan<span>
                                        @endif


                                        </h3>
                                    <h5 class="profile-id" style="padding-left:20px">{{$viewid->varan_id}}</h5>
                                    <div class="basicdetails">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <ul class="profiledetail-list">
                                                        <li><img src="../assets/images/Vector.png" class="img-fluid" style="width:30px">
                                                            @if($viewid->bioview == '0')
                                                            <span class="">{{$viewid->age}} Years</span>
                                                        @else
                                                            &nbsp;&nbsp;&nbsp;<span style="margin-left:30px;color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px;font-weight:bold">XX</span> Years
                                                        @endif

                                                        </li>
                                                        <li><img src="../assets/images/occupation.png" class="img-fluid" style="width:30px"><span class="">
                                                            @if($viewid->name == "")
                                                                -
                                                            @else
                                                            {{$viewid->name}}
                                                        @endif
                                                        </span></li>
                                                        <li><img src="../assets/images/education.png" class="img-fluid" style="width:30px"><span class="">
                                                            @if($viewid->eduname == "")
                                                                -
                                                                @else
                                                                {{$viewid->eduname}}
                                                            @endif
                                                        </span></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6">
                                                    <ul class="profiledetail-list">
                                                        <li><img src="../assets/images/religion.png" class="img-fluid" style="width:30px"><span class="">
                                                            @if($viewid->religion_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->religion_name}}
                                                            @endif
                                                        </span></li>

                                                        <li><img src="../assets/images/location.png" class="img-fluid" style="width:30px"><span class="">
                                                            @if($viewid->contactview == '0')
                                                                    @if($viewid->city_name == "")
                                                                        -
                                                                    @else
                                                                    {{$viewid->city_name}}
                                                                    @endif
                                                                @else
                                                                <span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">State</span>


                                                        @endif
                                                        </span></li>
                                                        <li><img src="../assets/images/subcaste.png" class="img-fluid" style="width:30px"><span class="">{{$viewid->subcategory_name}}</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- @dd($chatoption); --}}
                                @if($chatoption)
                                    @if($chatoption->enable_chat == 'Yes')
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#chatbox" style="background-color:#6d1140;border:0px;padding-top:15px;padding-bottom:15px;padding-left:25px;border-radius:0px 0px 20px 20px">Message</button>
                                    @endif
                                    @else
                                    <a href="/package" class="btn btn-primary"  style="background-color:#6d1140;border:0px;padding-top:15px;padding-bottom:15px;padding-left:25px;border-radius:0px 0px 20px 20px">Upgrade Premium chat with {{$viewid->Name}}</a>
                                @endif



                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">

                                        @if ($allinterest->count() == 1)
                                            <button class="btn btn-primary biobtn w-100" ><img src="../assets/images/send.png" class="img-fluid" style="width:30px"><span>Already Request Sent</span></button>
                                            @else

                                            <form method="POST" action="/sendproposal">
                                                @csrf
                                                <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                                                <input type="hidden" name="partnervaranid" value="{{$viewid->varan_id}}">
                                                <input type="hidden" name="status" value="Interest">
                                                <button class="btn btn-primary biobtn w-100" ><img src="../assets/images/send.png" class="img-fluid" style="width:30px"><span>Send Proposal Request</span></button>
                                            </form>
                                        @endif


                                    </div>
                                    <div class="col-lg-4">

                                            @if($favourite->count() == 1)
                                            <form method="POST" action="/addFavourite">
                                                @csrf
                                                <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                                                <input type="hidden" name="partnervaranid" value="{{$viewid->varan_id}}">
                                                <input type="hidden" name="status" value="liked">
                                                <button class="btn btn-primary w-100 biobtn"><img src="../assets/images/fav.png" class="img-fluid" style="width:30px"><span>
                                                    Already in favourite
                                                </span></button>
                                            </form>

                                                @else
                                                <form method="POST" action="/addFavourite">
                                                    @csrf
                                                    <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                                                    <input type="hidden" name="partnervaranid" value="{{$viewid->varan_id}}">
                                                    <input type="hidden" name="status" value="liked">
                                                    <button class="btn btn-primary w-100 biobtn"><img src="../assets/images/fav.png" class="img-fluid" style="width:30px"><span>
                                                        Add to Favourite
                                                    </span></button>
                                                </form>
                                            @endif



                                    </div>
                                    <div class="col-lg-4">
                                        @if($report == 0)
                                            <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary w-100 biobtn"><img src="../assets/images/send.png" class="img-fluid" style="width:30px"><span>
                                                Report
                                            </span></button>
                                            @else
                                            <button class="btn btn-primary w-100 biobtn"><img src="../assets/images/send.png" class="img-fluid" style="width:30px"><span>
                                                Already Report
                                            </span></button>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="row mobileresponsive">
                            <div class="col-lg-3">
                                <div class="sticky-top">
                                <img src="../assets/images/mobil_app.png" class="img-fluid m-auto d-block">
                                <a href=""><img src="../assets/images/android.png" class="img-fluid" style="margin:40px auto;display:block"></a>
                                <a href=""><img src="../assets/images/ios.png" class="img-fluid" style="margin:40px auto;display:block"></a>
                                <img src="../assets/images/download.png" class="img-fluid" style="margin:40px auto;display:block">
                            </div>
                            </div>
                            <div class="col-lg-9" >
                                <div class="detailssection">
                                    <div class="head">
                                        <h3 class="sectiontitle"><img src="../assets/images/aboutus.png" class="img-fluid" style="width:25px"><span>About Me</span></h3>
                                        {{-- <a href="" style="text-right">Text</a> --}}
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                @if($viewid->bioview == '0')
                                                <p style="font-size:18px;line-height:1.9;margin-top:10px">
                                                    @if($viewid->about_myself == "")
                                                            -
                                                            @else
                                                            {{$viewid->about_myself}}
                                                        @endif
                                                </p>
                                                @else
                                                <p style="font-size:18px;line-height:1.9;margin-top:10px;color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.5);">
                                                    XXXXX XXXXXX XXXXXX XXXXXX XXXXXX XXXXXX XXXXX XXXXXX XXXXXX XXXXXX XXXXXX XXXXXX XXXXX XXXXXX XXXXXX XXXXXX XXXXXX XXXXXX XXXXX
                                                </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="detailssection">

                                        <h3 class="sectiontitle"><img src="../assets/images/basic.png" class="img-fluid" style="width:25px"><span>Basic Details</span></h3>
                                        {{-- <button class="btn btn-primary btn-sm float-right">Edit</button> --}}
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Body Type</th>
                                                            @if($viewid->bioview == '0')
                                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">@if($viewid->btype == "")
                                                                    -
                                                                    @else
                                                                    {{$viewid->btype}}
                                                                @endif</td>
                                                            @else
                                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">XXXXX</span></td>
                                                            @endif

                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Physical Status</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> @if($viewid->phy_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->phy_name}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Date Of Birth</th>
                                                            @if($viewid->bioview == '0')
                                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">@if($viewid->dob == "")
                                                                -
                                                                @else
                                                                {{$viewid->dob}}
                                                            @endif</td>
                                                            @else
                                                                <td><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">XX-XX-XXXX</span></td>
                                                            @endif

                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Age</th>
                                                            @if($viewid->bioview == '0')
                                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> {{$viewid->age}}</td>
                                                            @else
                                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">XX</span></td>
                                                            @endif

                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Height</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> @if($viewid->height_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->height_name}}
                                                            @endif</td>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Complexion</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($viewid->com_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->com_name}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Matrital Status</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($viewid->matrial_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->matrial_name}}
                                                            @endif</td>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">No Of Children</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($viewid->no_of_children == "")
                                                                -
                                                                @else
                                                                {{$viewid->no_of_children}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Gender</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> {{$viewid->Gender}}</td>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Mobile Number</th>

                                                            @if($noofphoneno)
                                                                @if($noofphoneno == $viewedphoneno)

                                                                        @if($viewed == 1)
                                                                            <td>
                                                                                @if($viewid->mobile_no == "")
                                                                                -
                                                                                @else
                                                                                {{$viewid->mobile_no}}
                                                                                @endif
                                                                            </td>
                                                                            @else
                                                                            <td>
                                                                                <a href="/package" class="btn btn-primary premiumbtn">Update Premium</a>
                                                                            </td>
                                                                        @endif

                                                                    @else

                                                                    @if($viewid->contactview == '0')
                                                                        <td>
                                                                        @if($viewid->mobile_no == "")
                                                                        -
                                                                        @else
                                                                        {{$viewid->mobile_no}}


                                                                        @endif
                                                                        </td>
                                                                        @else
                                                                        <td>
                                                                            <form method="POST" action="/insertrequest">
                                                                                @csrf
                                                                                <input type="hidden" name="partnerid" value="{{$viewid->varan_id}}">
                                                                                <button type="submit" class="btn btn-primary">Request Button</button>
                                                                            </form>
                                                                        </td>

                                                                        @endif

                                                                @endif

                                                            @endif



                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">E-mail ID</th>
                                                            @if($viewid->contactview == '0')
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($viewid->email_id == "")
                                                                -
                                                                @else
                                                                {{$viewid->email_id	}}
                                                            @endif</td>
                                                                @else
                                                                <td><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">data@gmail.com</span></td>
                                                            @endif


                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="detailssection">
                                    <h3 class="sectiontitle"><img src="../assets/images/religion.png" class="img-fluid" style="width:25px"><span>Religious Details</span></h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Religion</th>
                                                            @if($viewid->bioview == '0')
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">@if($viewid->religion_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->religion_name}}
                                                            @endif</td>
                                                    @else
                                                    <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">XXXXXXX</span></td>
                                                    @endif

                                                                <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Caste</th>
                                                                @if($viewid->bioview == '0')
                                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($viewid->Caste_name == "")
                                                                    -
                                                                    @else
                                                                    {{$viewid->Caste_name}}
                                                                @endif</td>
                                                    @else
                                                    <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">XXXXXXX</span></td>
                                                    @endif

                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Sub Caste</th>
                                                            @if($viewid->bioview == '0')
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> @if($viewid->subcategory_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->subcategory_name}}
                                                            @endif</td>
                                                    @else
                                                    <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">XXXXXXX</span></td>
                                                    @endif


                                                        </tr>




                                                    </tbody>
                                                </table>
                                            </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>

                                <div class="detailssection">
                                    <h3 class="sectiontitle"><img src="../assets/images/location.png" class="img-fluid" style="width:25px"><span>Location Details</span></h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless mt-3">
                                                        <tbody>
                                                            <tr>
                                                                <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Address</th>
                                                                @if($viewid->contactview == '0')
                                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">@if($viewid->com_address == "")
                                                                    -
                                                                    @else
                                                                    {{$viewid->com_address}}
                                                                @endif</td>
                                                                    @else
                                                                    <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">Address</span></td>
                                                                @endif

                                                                <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Country</th>
                                                                @if($viewid->contactview == '0')
                                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">@if($viewid->country_name == "")
                                                                    -
                                                                    @else
                                                                    {{$viewid->country_name}}
                                                                @endif</td>
                                                                    @else
                                                                    <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">Country</span></td>
                                                                @endif

                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">State</th>
                                                                @if($viewid->contactview == '0')
                                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">@if($viewid->state_name == "")
                                                                    -
                                                                    @else
                                                                    {{$viewid->state_name}}
                                                                @endif</td>
                                                                    @else
                                                                    <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">State</span></td>
                                                                @endif

                                                                <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">District</th>
                                                                @if($viewid->contactview == '0')
                                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($viewid->city_name == "")
                                                                    -
                                                                    @else
                                                                    {{$viewid->city_name}}
                                                                @endif</td>
                                                                    @else
                                                                    <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">City Name</span></td>
                                                                @endif

                                                            </tr>
                                                            <tr>
                                                                <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Municipality/Panchayat</th>
                                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> @if($viewid->municipality_panchayat == "")
                                                                    -
                                                                    @else
                                                                    {{$viewid->municipality_panchayat}}
                                                                @endif</td>

                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="detailssection">
                                    <h3 class="sectiontitle"><img src="../assets/images/basic.png" class="img-fluid" style="width:25px"><span>Professional Details</span></h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Education</th>

                                                            @if($viewid->bioview == '0')
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> @if($viewid->eduname == "")
                                                                -
                                                                @else
                                                                {{$viewid->eduname}}
                                                            @endif</td>
                                                @else
                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">XXXXXXX</span></td>
                                                @endif


                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Education Detail</th>
                                                            @if($viewid->bioview == '0')
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($viewid->edudetails== "")
                                                                -
                                                                @else
                                                                {{$viewid->edudetails}}
                                                            @endif</td>
                                                @else
                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">XXXXXXX</span></td>
                                                @endif

                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Job Category</th>
                                                            @if($viewid->bioview == '0')
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">@if($viewid->name == "")
                                                                -
                                                                @else
                                                                {{$viewid->name}}
                                                            @endif</td>
                                                @else
                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">XXXXXXX</span></td>
                                                @endif

                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Job in detail</th>
                                                            @if($viewid->bioview == '0')
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> @if($viewid->job_detail == "")
                                                                -
                                                                @else
                                                                {{$viewid->job_detail}}
                                                            @endif</td>
                                                @else
                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">XXXXXXX</span></td>
                                                @endif

                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Job Location (Country)</th>
                                                            @if($viewid->bioview == '0')
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> @if($viewid->jobcountry == "")
                                                                -
                                                                @else
                                                                {{$viewid->jobcountry}}
                                                            @endif</td>
                                                @else
                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">XXXXXXX</span></td>
                                                @endif


                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Job Location (State)</th>
                                                            @if($viewid->bioview == '0')
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> @if($viewid->jobstate == "")
                                                                -
                                                                @else
                                                                {{$viewid->jobstate}}
                                                            @endif</td>
                                                @else
                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">XXXXXXX</span></td>
                                                @endif

                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Job Location (District)</th>
                                                            @if($viewid->bioview == '0')
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> @if($viewid->jobcity == "")
                                                                -
                                                                @else
                                                                {{$viewid->jobcity}}
                                                            @endif</td>
                                                @else
                                                <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">XXXXXXX</span></td>
                                                @endif


                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="detailssection">
                                    <h3 class="sectiontitle"><img src="../assets/images/family.png" class="img-fluid" style="width:25px"><span>Father Details</span></h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Name</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($viewid->father_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->father_name}}
                                                            @endif</td>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Job Details</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($viewid->father_occuption == "")
                                                                -
                                                                @else
                                                                {{$viewid->father_occuption}}
                                                            @endif</td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="detailssection">
                                    <h3 class="sectiontitle"><img src="../assets/images/family.png" class="img-fluid" style="width:25px"><span>Mother Details</span></h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Name</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($viewid->mother_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->mother_name}}
                                                            @endif</td>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Job Details</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($viewid->mother_occuption == "")
                                                                -
                                                                @else
                                                                {{$viewid->mother_occuption}}
                                                            @endif</td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="detailssection">
                                    <h3 class="sectiontitle"><img src="../assets/images/family.png" class="img-fluid" style="width:25px"><span>Sibling Details</span></h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">No Of Siblings</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">@if($viewid->total_sibblings == "")
                                                                -
                                                                @else
                                                                {{$viewid->total_sibblings}}
                                                            @endif</td>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">No Of Elder Sister</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">@if($viewid->elder_sister == "")
                                                                -
                                                                @else
                                                                {{$viewid->elder_sister}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">No Of Elder Brother</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> @if($viewid->elder_brother == "")
                                                                -
                                                                @else
                                                                {{$viewid->elder_brother}}
                                                            @endif</td>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">No Of Younger Sister</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">@if($viewid->younger_sister == "")
                                                                -
                                                                @else
                                                                {{$viewid->younger_sister}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">No Of Younger Brother</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">@if($viewid->younger_brother == "")
                                                                -
                                                                @else
                                                                {{$viewid->younger_brother}}
                                                            @endif</td>

                                                        </tr>


                                                    </tbody>
                                                </table>

                                            </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="detailssection">
                                    <h3 class="sectiontitle"><img src="../assets/images/partner.png" class="img-fluid" style="width:25px"><span>Partner Preference Details</span></h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Partner Age</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> @if($partners->age_from == "")
                                                                -
                                                                @else
                                                                {{$partners->age_from}}
                                                            @endif</td>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Partner Height</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> @if($partners->preference_height == "")
                                                                -
                                                                @else
                                                                {{$partners->preference_height}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Body Type</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> @if($partners->btype == "")
                                                                -
                                                                @else
                                                                {{$partners->btype}}
                                                            @endif</td>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Complexion</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($partners->com_name == "")
                                                                -
                                                                @else
                                                                {{$partners->com_name}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Marital Status</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($partners->matrial_name == "")
                                                                -
                                                                @else
                                                                {{$partners->matrial_name}}
                                                            @endif</td>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Education Category</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">   @if($partners->eduname == "")
                                                                -
                                                                @else
                                                                {{$partners->eduname}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Education Details</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($partners->preference_edudetails == "")
                                                                -
                                                                @else
                                                                {{$partners->preference_edudetails}}
                                                            @endif</td>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Job Category</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($partners->name == "")
                                                                -
                                                                @else
                                                                {{$partners->name}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Religion</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> @if($partners->religion_name == "")
                                                                -
                                                                @else
                                                                {{$partners->religion_name}}
                                                            @endif</td>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Caste</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">   @if($partners->Caste_name == "")
                                                                -
                                                                @else
                                                                {{$partners->Caste_name}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Sub Caste</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($partners->subcategory_name == "")
                                                                -
                                                                @else
                                                                {{$partners->subcategory_name}}
                                                            @endif</td>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">State</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">   @if($partners->state_name == "")
                                                                -
                                                                @else
                                                                {{$partners->state_name}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Country</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> @if($partners->country_name == "")
                                                                -
                                                                @else
                                                                {{$partners->country_name}}
                                                            @endif</td>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">District</th>
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($partners->city_name == "")
                                                                -
                                                                @else
                                                                {{$partners->city_name}}
                                                            @endif</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="detailssection">
                                    <h3 class="sectiontitle"><img src="../assets/images/horoscope.png" class="img-fluid" style="width:25px"><span>Horoscope Details</span></h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Zodiac</th>
                                                            @if($viewid->bioview == '0')
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">  @if($viewid->rasi == "")
                                                                -
                                                                @else
                                                                {{$viewid->rasi}}
                                                            @endif</td>
                                                        @else
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">XX-XX-XXXX</span></td>
                                                        @endif

                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Laknam</th>
                                                            @if($viewid->bioview == '0')
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">@if($viewid->laknam == "")
                                                                -
                                                                @else
                                                                {{$viewid->laknam}}
                                                            @endif</td>
                                                        @else
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">XX-XX-XXXX</span></td>
                                                        @endif

                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;">Stars</th>
                                                            @if($viewid->bioview == '0')
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"> @if($viewid->star == "")
                                                                -
                                                                @else
                                                                {{$viewid->star}}
                                                            @endif</td>
                                                        @else
                                                            <td style="vertical-align:middle;word-wrap: break-word;min-width: 160px;max-width: 160px;"><span style="color: transparent;text-shadow: 0 0 5px rgba(0,0,0,0.3);font-size:17px;margin-left:0px">XX-XX-XXXX</span></td>
                                                        @endif

                                                        </tr>




                                                    </tbody>
                                                </table>
                                            </div>
                                                <h5 style="font-weight:bold;margin-left:20px;">Horoscope Image</h5>
                                                @if($enablehoro)
                                                    @if($enablehoro->enable_horoschope == 'Yes')
                                                        @if($viewid->Himageview == '0')
                                                            <img src="../images/{{$horoscopeimages->img_name}}" class="img-fluid">
                                                            @else
                                                            <img src="../assets/images/imagelocked.png" class="img-fluid m-auto d-block">
                                                        @endif
                                                    @endif
                                                    @else
                                                    <a href="/package" style="text-center;text-decoration:none">
                                                        <img src="../assets/images/imagelocked.png" class="img-fluid m-auto d-block"><br>
                                                        <button class="btn btn-primary premiumbtn  m-auto d-block">Upgrade Premium</button>
                                                    </a>
                                                @endif


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
    </section>

    <div class="modal fade" id="chatbox" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Chat With Partner</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card" style="height:500px" id="elementID">
                    {{-- <div class="card-header">
                        <h3 class="text-center">User Name</h3>
                      </div> --}}

                    <div class="card-body" style="height:700px;overflow-y:scroll" id="appenddata">
                        @if($chatbox)
                            @foreach ($chatbox as $chat)
                                @if($chat->user_id == session('LoggedUser'))
                                <div class="alert " style="background-color:#E27B21;margin-bottom:0px" role="alert">
                                    <h6 class="text-white" style="font-size:20px;margin-bottom:0px">{{$chat->send_message}}</h6>

                                  </div>
                                  <p style="text-align:right;font-size:13px;margin-bottom:0px;padding:5px 0px;font-weight:bold">Message Sent</p>
                                  @else
                                  <div class="alert" style="background-color:#DB3470;margin-bottom:0px" role="alert">
                                    <h6 class="text-white" style="font-size:20px;margin-bottom:0px">{{$chat->send_message}}</h6>
                                  </div>
                                  <p style="text-align:right;font-size:13px;margin-bottom:0px;padding:5px 0px;font-weight:bold">Message Received</p>
                                @endif


                            @endforeach
                        @endif



                    </div>

                    <div class="card-footer text-muted">
                        <form  id="contactForm">

                            <input type="hidden" id="userid" name="userid" value="{{session('LoggedUser')}}">
                            <input type="hidden" id="partnerid" name="partnerid" value="{{$viewid->varan_id}}">
                            <input type="hidden" id="sendby" name="sendby" value="{{session('LoggedUser')}}">

                            <div class="input-group mb-3">
                                <input type="text" id="sendmessage" name="sendmessage" class="form-control" placeholder="Enter Message" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button type="submit" id="submit" class="btn btn-outline-secondary" style="background-color: #6d1140;color:#fff" type="button" id="button-addon2"><i class="bi bi-send-fill"></i>&nbsp;&nbsp;&nbsp;Send</button>

                              </div>
                        </form>
                        <p id="success-message"></p>
                      </div>
                </div>
            </div>

          </div>
        </div>
      </div>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Report Profile</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/addReport">
                    @csrf
                    <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                    <input type="hidden" name="partnervaranid" value="{{$viewid->varan_id}}">
                    <textarea class="form-control" name="reason" placeholder="Enter Report Reason" required></textarea>
                    <button class="btn btn-primary w-100 biobtn"><span>

                        Send Report
                    </span></button>
                </form>
            </div>

          </div>
        </div>
      </div>
@endsection


