@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')

<section class="register-section">

    <div class="container">
        <div class="register-inner">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 ">
                    <div class="row">
                        <div class="col-lg-4 ">
                            <h2 class="text-center" style="font-weight:bold;font-size:55px">{{$count1}}%</h2>
                        </div>
                        <div class="col-lg-8 ">
                            <div class="card" style="border-radius:50px;margin-top:10px">
                                <div class="card-body">
                                    <div class="progress ">
                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{$count1}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                @if(session()->get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <div class="col-lg-10 offset-lg-1">
                    <div class="card " style="border-radius:20px 20px 20px 20px">
                        <div class="card-body" style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:30px">
                            <ul class="menuicons p-0">
                                <li class="menulist" ><a class="menulink" href="/aboutme"><img src="assets/images/Group_11.png" class="img-fluid"></a></li>
                                <li class="menulist" ><a class="menulink" href="/image"><img src="assets/images/Group_11.png" class="img-fluid"></a></li>
                                <li class="menulist" ><a class="menulink" href="/basicdetails"><img src="assets/images/Group_12.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/religion"><img src="assets/images/Group_13.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/location"><img src="assets/images/Group_14.png" class="img-fluid"></a></li>
                                <li class="menulist" style="background-color:#D1B162"><a class="menulink" href="/professional"><img src="assets/images/Group_15.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/family"><img src="assets/images/Group_16.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/preference"><img src="assets/images/Group_17.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/horoscope"><img src="assets/images/Group_18.png" class="img-fluid"></a></li>
                            </ul>

                            <h3 style="font-weight:bold;margin-left:20px">Professional Details</h3>

                            <form style="padding:20px" method="POST" action="/updateprofessionaldetails">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Education category</label>
                                            <select class="form-control form-design-3 bodytype select2" name="educationcat">
                                                <option value="">-- Choose Education --</option>
                                                @if($education)
                                                @foreach ($education as $edu)
                                                    <option value="{{$edu->id}}" {{ $edu->id == $data->eduction ? 'selected' : '' }}>{{$edu->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Education in details</label>
                                            <input type="text" class="form-control form-design-2" name="educationdetail" value="{{$data->eduction_detail}}">

                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Job Category</label>
                                            <select class="form-control form-design-3 bodytype select2" name="jobcategory">
                                                <option value="">-- Choose Job Category --</option>
                                                @if($job)
                                                @foreach ($job as $jobs)
                                                    <option value="{{$jobs->id}}" {{ $jobs->id == $data->job_category ? 'selected' : '' }}>{{$jobs->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-lg-4 mt-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Job in Details</label>
                                            <input type="text" class="form-control form-design-2" name="jobdetail" value="{{$data->job_detail}}">

                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Job Location country</label>
                                            <select class="form-control form-design-3 bodytype select2" name="joblocationcountry">
                                                <option value="">-- Choose Country --</option>
                                                @if($country1)
                                                @foreach ($country1 as $countrys)
                                                    <option value="{{$countrys->country_id}}" {{ $countrys->country_id == $data->job_country ? 'selected' : '' }}>{{$countrys->country_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mt-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Job Location state</label>
                                            <select class="form-control form-design-3 bodytype select2" name="joblocationstate">
                                                <option value="">-- Choose State --</option>
                                                @if($state1)
                                                @foreach ($state1 as $states)
                                                    <option value="{{$states->state_id}}" {{ $states->state_id == $data->job_state ? 'selected' : '' }}>{{$states->state_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mt-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Job Location District</label>
                                            <select class="form-control form-design-3 bodytype select2" name="joblocationdistrict">
                                                <option value="">-- Choose District --</option>
                                                @if($cities1)
                                                @foreach ($cities1 as $city)
                                                    <option value="{{$city->city_id}}" {{ $city->city_id == $data->job_city ? 'selected' : '' }}>{{$city->city_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mt-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Annual Income</label>
                                            <select class="form-control form-design-3 bodytype select2" name="income">
                                                <option>-- Choose Income --</option>
                                                <option value="1">Less than 50,000</option>
                                                <option value="2">50,000</option>
                                                <option value="3">1 Laks</option>
                                                <option value="4">2 laks</option>
                                                <option value="5">3 Laks</option>
                                                <option value="6">4 Laks</option>
                                                <option value="7">5 Laks</option>
                                                <option value="8">6 Laks</option>
                                                <option value="9">7 Laks</option>
                                                <option value="10">8 Laks</option>
                                                <option value="11">9 Laks</option>
                                                <option value="12">10 Laks</option>
                                                <option value="13">11 Laks</option>
                                                <option value="14">12 Laks</option>
                                                <option value="15">13 Laks</option>
                                                <option value="16">14 Laks</option>
                                                <option value="17">15 Laks</option>
                                                <option value="18">16 Laks</option>
                                                <option value="19">17 Laks</option>
                                                <option value="20">18 Laks</option>
                                                <option value="21">20 Laks</option>
                                                <option value="22">25 Laks</option>
                                                <option value="23">30 Laks</option>
                                                <option value="24">35 Laks</option>
                                                <option value="25">40 Laks</option>
                                                <option value="26">45 Laks</option>
                                                <option value="27">50 Laks</option>
                                                <option value="28">55 Laks</option>
                                                <option value="29">60 Laks</option>
                                                <option value="30">65 Laks</option>
                                                <option value="31">70 Laks</option>
                                                <option value="32">80 Laks</option>
                                                <option value="33">90 Laks</option>
                                                <option value="34">1 Crore</option>
                                                <option value="35">1 Crore Above</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mt-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Job Location (if country not india)</label>
                                            <input type="text" class="form-control form-design-2" name="joblocation2" value="{{$data->job_location}}">
                                        </div>
                                    </div>
                                </div>


                                <input type="hidden" name="varanid" value="{{session('LoggedUser')}}">
                                <button type="submit" class="btn btn-primary" style="border-radius:50px;background-image: linear-gradient(to right, #98803b 0%, #98803b 41%, #b69972 100%);border:0px;margin:25px auto;display:block;width:250px">Save & Continue</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
</div>
</section>
@endsection

