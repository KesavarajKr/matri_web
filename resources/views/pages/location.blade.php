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
                                <li class="menulist" ><a class="menulink" href="/aboutme"><i class="bi bi-card-text" style="color:#fff;font-size:25px" ></i></a></li>
                                <li class="menulist" ><a class="menulink" href="/image"><i class="bi bi-card-image" style="color:#fff;font-size:25px" ></i></a></li>
                                <li class="menulist" ><a class="menulink" href="/basicdetails"><i class="bi bi-card-checklist" style="color:#fff;font-size:25px"></i> </a></li>
                                <li class="menulist" ><a class="menulink" href="/religion"><i class="bi bi-bank2" style="color:#fff;font-size:25px"></i></a></li>
                                <li class="menulist" style="background-color:#D1B162"><a class="menulink" href="/location"><i class="bi bi-geo-alt-fill" style="color:#6d1140;font-size:25px"></i></a></li>
                                <li class="menulist"><a class="menulink" href="/professional"><i class="bi bi-bag-check-fill" style="color:#fff;font-size:25px"></i></a></li>
                                <li class="menulist"><a class="menulink" href="/family"><i class="bi bi-people-fill" style="color:#fff;font-size:25px"></i></a></li>
                                <li class="menulist"><a class="menulink" href="/preference"><i class="bi bi-person-lines-fill" style="color:#fff;font-size:25px"></i></a></li>
                                <li class="menulist"><a class="menulink" href="/horoscope"><i class="bi bi-snow" style="color:#fff;font-size:25px"></i></a></li>
                            </ul>

                            <h3 style="font-weight:bold;margin-left:20px">Location Details</h3>

                            <form style="padding:20px" method="POST" action="/updatelocationdetails">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Communication Address</label>
                                            <input type="text" class="form-control form-design-2" name="comaddre" value="{{$data->com_address}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Country</label>
                                            <select class="form-control form-design-3 bodytype select2" name="country">
                                                <option value="">-- Choose Country --</option>
                                                @if($country1)
                                                @foreach ($country1 as $countrys)
                                                    <option value="{{$countrys->country_id}}" {{ $countrys->country_id == $data->country ? 'selected' : '' }}>{{$countrys->country_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">State</label>
                                            <select class="form-control form-design-3 bodytype select2" name="state">
                                                <option value="">-- Choose State --</option>
                                                @if($state1)
                                                @foreach ($state1 as $states)
                                                    <option value="{{$states->state_id}}" {{ $states->state_id == $data->state ? 'selected' : '' }}>{{$states->state_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">District</label>
                                            <select class="form-control form-design-3 bodytype select2" name="district">
                                                <option value="">-- Choose District --</option>
                                                @if($cities1)
                                                @foreach ($cities1 as $city)
                                                    <option value="{{$city->city_id}}" {{ $city->city_id == $data->district ? 'selected' : '' }}>{{$city->city_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>

                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-3">

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Municipal Name</label>
                                            <input type="text" class="form-control form-design-2" name="municipalname" value="{{$data->municipality_panchayat}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Address (If country not in india)</label>
                                            <input type="text" class="form-control form-design-2" name="commaddre" value="{{$data->other_countryaddress}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label style="color:#000;font-weight:bold;margin-bottom:10px">Route to residence</label>
                                            <input type="text" class="form-control form-design-2" name="route" value="{{$data->residential_address}}">
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

