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
                                <li class="menulist" style="background-color:#D1B162"><a class="menulink" href="/basicdetails"><img src="assets/images/Group_12.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/religion"><img src="assets/images/Group_13.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/location"><img src="assets/images/Group_14.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/professional"><img src="assets/images/Group_15.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/family"><img src="assets/images/Group_16.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/preference"><img src="assets/images/Group_17.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/horoscope"><img src="assets/images/Group_18.png" class="img-fluid"></a></li>
                            </ul>

                            <h3 style="font-weight:bold;margin-left:20px">Basic Details</h3>

                            <form style="padding:20px" method="POST" action="/updatebasicdetails">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Name</label>
                                            <input type="text" class="form-control form-design-2" name="name" value="{{$data->Name}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Body Type</label>
                                            <select class="form-control form-design-3 bodytype select2" name="bodytype">
                                                <option value="">-- Choose Body Type --</option>
                                                @if($btype_tb)
                                                @foreach ($btype_tb as $body)
                                                    <option value="{{$body->id}}" {{ $body->id == $data->body_type ? 'selected' : '' }}>{{$body->btype}}</option>
                                                @endforeach
                                            @endif
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Physical Status</label>
                                            <select class="form-control form-design-3  select2" name="physicalstatus">
                                                <option value="">-- Choose Physical Status --</option>
                                                @if($phytb)
                                                @foreach ($phytb as $phytbl)
                                                    <option value="{{$phytbl->id}}" {{ $phytbl->id == $data->physical_status ? 'selected' : '' }}>{{$phytbl->phy_name}}</option>
                                                @endforeach
                                            @endif
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Date Of Birth</label>
                                            <input type="date" class="form-control form-design-2" name="dob" value="{{$data->dob}}">

                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Complexion</label>
                                            <select class="form-control form-design-3  select2" name="complexion">
                                                <option value="">-- Choose Complexion --</option>
                                                @if($complexion1)
                                                @foreach ($complexion1 as $complexiondetails1)
                                                    <option value="{{$complexiondetails1->id}}" {{ $complexiondetails1->id == $data->complexion ? 'selected' : '' }}>{{$complexiondetails1->com_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Height</label>
                                            <select class="form-control form-design-3  select2" name="height">
                                                <option value="">-- Choose Height --</option>
                                                @if($height1)
                                                @foreach ($height1 as $ht)
                                                    <option value="{{$ht->id}}" {{ $ht->id == $data->height ? 'selected' : '' }}>{{$ht->height_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Marital Status</label>
                                            <select class="form-control form-design-3  select2" name="maritalstatus">
                                                <option value="">-- Choose Marital Status --</option>
                                                @if($matrial_tb)
                                                @foreach ($matrial_tb as $marriage)
                                                    <option value="{{$marriage->id}}" {{ $marriage->id == $data->marital_status ? 'selected' : '' }}>{{$marriage->matrial_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">No Of Children</label>
                                            <input type="number" class="form-control form-design-2" name="noofchildren" value="{{$data->no_of_children}}">

                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Gender</label>
                                            <select class="form-control form-design-3  select2" name="gender">
                                                <option value="Male" @if($data->mobile_no == "Male")selected @else @endif>Male</option>
                                                <option value="Female" @if($data->mobile_no == "Female")selected @else @endif>Female</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Mobile Number</label>
                                            <input type="number" class="form-control form-design-2" name="mblnum" value="{{$data->mobile_no}}">

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Whatsapp Number</label>
                                            <input type="number" class="form-control form-design-2" name="whatsappnum" value="{{$data->whatsapp_no}}">

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">E-mail</label>
                                            <input type="email" class="form-control form-design-2" name="email" value="{{$data->email_id}}">

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

