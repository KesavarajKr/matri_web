@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')


        <section class="myprofile-section">

            <div class="container">
                <div class="register-inner">
                    <div class="row">

                        <div class="col-lg-3 align-items-center text-center">
                            <div class="card profilebox">

                                    <div class="card-body">
                                        <div class="profile-image-box">
                                            <img src="../images/1649049933.png" class="img-fluid">
                                        </div>
                                        <div class="owl-carousel mt-4">
                                            <div>
                                                <div class="profile-img-thumb">
                                                    <img src="../images/1649049933.png" class="img-fluid">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="profile-img-thumb">
                                                    <img src="../images/1649049933.png" class="img-fluid">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="profile-img-thumb">
                                                    <img src="../images/1649049933.png" class="img-fluid">
                                                </div>
                                            </div>
                                            <div>
                                                <div class="profile-img-thumb">
                                                    <img src="../images/1649049933.png" class="img-fluid">
                                                </div>
                                            </div>

                                          </div>
                                          {{-- <a href="/image" style="background-color:#6d1140;border:0px" class="btn btn-primary w-100 mt-3">Edit Image</a> --}}
                                    </div>
                              </div>

                        </div>
                        <div class="col-lg-9">
                            <div class="card profile-info">
                                <div class="card-body">
                                    <h3 class="profile-name" style="padding-left:20px">{{$viewid->Name}}</h3>
                                    <h5 class="profile-id" style="padding-left:20px">{{$viewid->varan_id}}</h5>
                                    <div class="basicdetails">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <ul class="profiledetail-list">
                                                        <li><img src="../assets/images/Vector.png" class="img-fluid" style="width:30px"><span class="">{{$viewid->age}} Years</span></li>
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
                                                            @if($viewid->city_name == "")
                                                                -
                                                            @else
                                                            {{$viewid->city_name}}
                                                        @endif
                                                        </span></li>
                                                        <li><img src="../assets/images/subcaste.png" class="img-fluid" style="width:30px"><span class="">{{$viewid->subcategory_name}}</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" style="background-color:#6d1140;border:0px;padding-top:15px;padding-bottom:15px;padding-left:25px;border-radius:0px 0px 20px 20px">Message</button>

                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <form method="POST" action="/sendproposal">
                                            @csrf
                                            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                                            <input type="hidden" name="partnervaranid" value="{{$viewid->varan_id}}">
                                            <input type="hidden" name="status" value="Interest">
                                            <button class="btn btn-primary biobtn w-100" ><img src="../assets/images/send.png" class="img-fluid" style="width:30px"><span>Send Proposal Request</span></button>
                                        </form>

                                    </div>
                                    <div class="col-lg-4">

                                            <form method="POST" action="/addFavourite">
                                                @csrf
                                                <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                                                <input type="hidden" name="partnervaranid" value="{{$viewid->varan_id}}">
                                                <input type="hidden" name="status" value="liked">
                                                <button class="btn btn-primary w-100 biobtn"><img src="../assets/images/fav.png" class="img-fluid" style="width:30px"><span>
                                                    Add to Favourite
                                                </span></button>
                                            </form>


                                    </div>
                                    <div class="col-lg-4">
                                        <button class="btn btn-primary w-100 biobtn">Report</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="sticky-top">
                                <img src="../assets/images/mobil_app.png" class="img-fluid">
                                <a href=""><img src="../assets/images/android.png" class="img-fluid mt-4"></a>
                                <a href=""><img src="../assets/images/ios.png" class="img-fluid mt-4"></a>
                                <img src="../assets/images/download.png" class="img-fluid mt-4">
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
                                                <p style="font-size:18px;line-height:1.9;margin-top:10px">
                                                    @if($viewid->about_myself == "")
                                                            -
                                                            @else
                                                            {{$viewid->about_myself}}
                                                        @endif
                                                </p>
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
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th>Body Type</th>
                                                            <td>@if($viewid->btype == "")
                                                                -
                                                                @else
                                                                {{$viewid->btype}}
                                                            @endif</td>
                                                            <th>Physical Status</th>
                                                            <td> @if($viewid->phy_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->phy_name}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Date Of Birth</th>
                                                            <td>@if($viewid->dob == "")
                                                                -
                                                                @else
                                                                {{$viewid->dob}}
                                                            @endif</td>
                                                            <th>Age</th>
                                                            <td> {{$viewid->age}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Height</th>
                                                            <td> @if($viewid->height_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->height_name}}
                                                            @endif</td>
                                                            <th>Complexion</th>
                                                            <td>  @if($viewid->com_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->com_name}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Matrital Status</th>
                                                            <td>  @if($viewid->matrial_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->matrial_name}}
                                                            @endif</td>
                                                            <th>No Of Children</th>
                                                            <td>  @if($viewid->no_of_children == "")
                                                                -
                                                                @else
                                                                {{$viewid->no_of_children}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Gender</th>
                                                            <td> {{$viewid->Gender}}</td>
                                                            <th>Whatsapp Number</th>
                                                            <td>  @if($viewid->whatsapp_no == "")
                                                                -
                                                                @else
                                                                {{$viewid->whatsapp_no	}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>E-mail ID</th>
                                                            <td>  @if($viewid->email_id == "")
                                                                -
                                                                @else
                                                                {{$viewid->email_id	}}
                                                            @endif</td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="detailssection">
                                    <h3 class="sectiontitle"><img src="../assets/images/religion.png" class="img-fluid" style="width:25px"><span>Religious Details</span></h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th>Religion</th>
                                                            <td>@if($viewid->religion_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->religion_name}}
                                                            @endif</td>
                                                            <th>Caste</th>
                                                            <td>  @if($viewid->Caste_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->Caste_name}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Sub Caste</th>
                                                            <td> @if($viewid->subcategory_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->subcategory_name}}
                                                            @endif</td>

                                                        </tr>




                                                    </tbody>
                                                </table>
                                            </div>



                                        </div>
                                    </div>
                                </div>

                                <div class="detailssection">
                                    <h3 class="sectiontitle"><img src="../assets/images/location.png" class="img-fluid" style="width:25px"><span>Location Details</span></h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th>Address</th>
                                                            <td>@if($viewid->com_address == "")
                                                                -
                                                                @else
                                                                {{$viewid->com_address}}
                                                            @endif</td>
                                                            <th>Country</th>
                                                            <td>@if($viewid->country_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->country_name}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>State</th>
                                                            <td>@if($viewid->state_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->state_name}}
                                                            @endif</td>
                                                            <th>District</th>
                                                            <td>  @if($viewid->city_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->city_name}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Municipality/Panchayat</th>
                                                            <td> @if($viewid->municipality_panchayat == "")
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

                                <div class="detailssection">
                                    <h3 class="sectiontitle"><img src="../assets/images/basic.png" class="img-fluid" style="width:25px"><span>Professional Details</span></h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th>Education</th>
                                                            <td> @if($viewid->eduname == "")
                                                                -
                                                                @else
                                                                {{$viewid->eduname}}
                                                            @endif</td>
                                                            <th>Education Detail</th>
                                                            <td>  @if($viewid->edudetails== "")
                                                                -
                                                                @else
                                                                {{$viewid->edudetails}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Job Category</th>
                                                            <td>@if($viewid->name == "")
                                                                -
                                                                @else
                                                                {{$viewid->name}}
                                                            @endif</td>
                                                            <th>Job in detail</th>
                                                            <td> @if($viewid->job_detail == "")
                                                                -
                                                                @else
                                                                {{$viewid->job_detail}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Job Location (Country)</th>
                                                            <td> @if($viewid->jobcountry == "")
                                                                -
                                                                @else
                                                                {{$viewid->jobcountry}}
                                                            @endif</td>
                                                            <th>Job Location (State)</th>
                                                            <td> @if($viewid->jobstate == "")
                                                                -
                                                                @else
                                                                {{$viewid->jobstate}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Job Location (District)</th>
                                                            <td> @if($viewid->jobcity == "")
                                                                -
                                                                @else
                                                                {{$viewid->jobcity}}
                                                            @endif</td>

                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="detailssection">
                                    <h3 class="sectiontitle"><img src="../assets/images/family.png" class="img-fluid" style="width:25px"><span>Father Details</span></h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th>Name</th>
                                                            <td>  @if($viewid->father_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->father_name}}
                                                            @endif</td>
                                                            <th>Job Details</th>
                                                            <td>  @if($viewid->father_occuption == "")
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
                                <div class="detailssection">
                                    <h3 class="sectiontitle"><img src="../assets/images/family.png" class="img-fluid" style="width:25px"><span>Mother Details</span></h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th>Name</th>
                                                            <td>  @if($viewid->mother_name == "")
                                                                -
                                                                @else
                                                                {{$viewid->mother_name}}
                                                            @endif</td>
                                                            <th>Job Details</th>
                                                            <td>  @if($viewid->mother_occuption == "")
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
                                <div class="detailssection">
                                    <h3 class="sectiontitle"><img src="../assets/images/family.png" class="img-fluid" style="width:25px"><span>Sibling Details</span></h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th>No Of Siblings</th>
                                                            <td>@if($viewid->total_sibblings == "")
                                                                -
                                                                @else
                                                                {{$viewid->total_sibblings}}
                                                            @endif</td>
                                                            <th>No Of Elder Sister</th>
                                                            <td>@if($viewid->elder_sister == "")
                                                                -
                                                                @else
                                                                {{$viewid->elder_sister}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>No Of Elder Brother</th>
                                                            <td> @if($viewid->elder_brother == "")
                                                                -
                                                                @else
                                                                {{$viewid->elder_brother}}
                                                            @endif</td>
                                                            <th>No Of Younger Sister</th>
                                                            <td>@if($viewid->younger_sister == "")
                                                                -
                                                                @else
                                                                {{$viewid->younger_sister}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>No Of Younger Brother</th>
                                                            <td>@if($viewid->younger_brother == "")
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
                                <div class="detailssection">
                                    <h3 class="sectiontitle"><img src="../assets/images/partner.png" class="img-fluid" style="width:25px"><span>Partner Preference Details</span></h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th>Partner Age</th>
                                                            <td> @if($partners->age_from == "")
                                                                -
                                                                @else
                                                                {{$partners->age_from}}
                                                            @endif</td>
                                                            <th>Partner Height</th>
                                                            <td> @if($partners->preference_height == "")
                                                                -
                                                                @else
                                                                {{$partners->preference_height}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Body Type</th>
                                                            <td> @if($partners->btype == "")
                                                                -
                                                                @else
                                                                {{$partners->btype}}
                                                            @endif</td>
                                                            <th>Complexion</th>
                                                            <td>  @if($partners->com_name == "")
                                                                -
                                                                @else
                                                                {{$partners->com_name}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Marital Status</th>
                                                            <td>  @if($partners->matrial_name == "")
                                                                -
                                                                @else
                                                                {{$partners->matrial_name}}
                                                            @endif</td>
                                                            <th>Education Category</th>
                                                            <td>   @if($partners->eduname == "")
                                                                -
                                                                @else
                                                                {{$partners->eduname}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Education Details</th>
                                                            <td>  @if($partners->preference_edudetails == "")
                                                                -
                                                                @else
                                                                {{$partners->preference_edudetails}}
                                                            @endif</td>
                                                            <th>Job Category</th>
                                                            <td>  @if($partners->name == "")
                                                                -
                                                                @else
                                                                {{$partners->name}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Religion</th>
                                                            <td> @if($partners->religion_name == "")
                                                                -
                                                                @else
                                                                {{$partners->religion_name}}
                                                            @endif</td>
                                                            <th>Caste</th>
                                                            <td>   @if($partners->Caste_name == "")
                                                                -
                                                                @else
                                                                {{$partners->Caste_name}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Sub Caste</th>
                                                            <td>  @if($partners->subcategory_name == "")
                                                                -
                                                                @else
                                                                {{$partners->subcategory_name}}
                                                            @endif</td>
                                                            <th>State</th>
                                                            <td>   @if($partners->state_name == "")
                                                                -
                                                                @else
                                                                {{$partners->state_name}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Country</th>
                                                            <td> @if($partners->country_name == "")
                                                                -
                                                                @else
                                                                {{$partners->country_name}}
                                                            @endif</td>
                                                            <th>District</th>
                                                            <td>  @if($partners->city_name == "")
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
                                <div class="detailssection">
                                    <h3 class="sectiontitle"><img src="../assets/images/horoscope.png" class="img-fluid" style="width:25px"><span>Horoscope Details</span></h3>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-borderless mt-3">
                                                    <tbody>
                                                        <tr>
                                                            <th>Zodiac</th>
                                                            <td>  @if($viewid->rasi == "")
                                                                -
                                                                @else
                                                                {{$viewid->rasi}}
                                                            @endif</td>
                                                            <th>Laknam</th>
                                                            <td>@if($viewid->laknam == "")
                                                                -
                                                                @else
                                                                {{$viewid->laknam}}
                                                            @endif</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Stars</th>
                                                            <td> @if($viewid->star == "")
                                                                -
                                                                @else
                                                                {{$viewid->star}}
                                                            @endif</td>

                                                        </tr>




                                                    </tbody>
                                                </table>
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


