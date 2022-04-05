@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')

    <section class="register-section">

            <div class="container">
                <div class="register-inner">
                <div class="row">
                    <div class="col-lg-4 " >
                        <img src="assets/images/couple-img.png" class="img-fluid" style="padding:0px;margin-top:25px;border-radius:50px 0px 0px 50px">
                    </div>
                    <div class="col-lg-8 ">
                        <div class="form-container">
                            <form method="POST" action="{{route('register.store')}}">
                                @csrf

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 text-center">
                                        <label class="label-1">Im Looking For</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lookingfor" id="exampleRadios1" value="1" @if($gender == "Male")checked @else @endif>
                                            <label class="form-check-label" for="exampleRadios1">
                                              Bride
                                            </label>
                                          </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lookingfor" id="exampleRadios2" value="2" @if($gender == "Female")checked @else @endif>
                                            <label class="form-check-label" for="exampleRadios2">
                                              Groom
                                            </label>
                                          </div>
                                    </div>
                                </div>
                                <div class="row mt-3">

                                    <div class="col-lg-12">
                                        <label class="label-2">Profile Created By</label>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="switch-field">
                                            <input type="radio" id="radio-three" name="createdby" value="Self" checked/>
                                            <label for="radio-three">Self</label>
                                            <input type="radio" id="radio-four" name="createdby" value="Parents" />
                                            <label for="radio-four">Parents</label>
                                            <input type="radio" id="radio-five" name="createdby" value="Sibling" />
                                            <label for="radio-five">Sibling</label>
                                            <input type="radio" id="radio-six" name="createdby" value="Relative" />
                                            <label for="radio-six">Relative</label>
                                            <input type="radio" id="radio-seven" name="createdby" value="Friend" />
                                            <label for="radio-seven">Friend</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-6">
                                        <label class="label-2">Gender</label>

                                        <select class="form-control form-design-2 select2" name="gender">
                                            <option>-- Choose Gender --</option>
                                            <option value="Male" @if($gender == "Male")selected @else @endif >Male</option>
                                            <option value="Female" @if($gender == "Female")selected @else @endif>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="label-2">Name</label>
                                        <input type="text" name="name" class="form-control form-design-2" value="{{$name}}" placeholder="Type your name here" >
                                    </div>
                                </div>

                                <div class="row mt-3">

                                    <div class="col-lg-4">
                                        <label class="label-2">Date Of Birth</label>
                                        <input type="date" name="dob" class="form-control form-design-2" placeholder="Type your name here">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="label-2">E-mail ID</label>
                                        <input type="email" name="email" class="form-control form-design-2" placeholder="Type your email">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="label-2">Mother Tongue</label>
                                        <select class="form-control form-design-2 select2" name="montongue">
                                            <option value="">-- Choose Mother Tongue --</option>

                                            @if($mor_ton)
                                                @foreach ($mor_ton as $motherton)
                                                    <option value="{{$motherton->mor_name}}">{{$motherton->mor_name}}</option>
                                                @endforeach
                                            @endif


                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-4">
                                        <label class="label-2">Country Code</label>
                                        <input type="number" name="countrycode" class="form-control form-design-2" placeholder="" >
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="label-2">Mobile Number</label>
                                        <input type="number" name="mblnum" class="form-control form-design-2" value="{{$pnumber}}" placeholder="Type your number" >
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="label-2">Password</label>
                                        <input type="password" name="password" class="form-control form-design-2" placeholder="Type your Password">
                                    </div>

                                </div>

                                <div class="row mt-3">

                                    <div class="col-lg-4">
                                        <label class="label-2">Religion</label>
                                        <select class="form-control form-design-2 select2" name="religion">
                                            <option value="">-- Choose Religion --</option>
                                            @if($regli_tb)
                                            @foreach ($regli_tb as $religion)
                                                <option value="{{$religion->id}}">{{$religion->religion_name}}</option>
                                            @endforeach
                                        @endif
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="label-2">Caste</label>
                                        <select class="form-control form-design-2 select2" name="caste">
                                            <option value="">-- Choose Caste --</option>
                                            @if($castes)
                                            @foreach ($castes as $caste)
                                                <option value="{{$caste->id}}">{{$caste->Caste_name}}</option>
                                            @endforeach
                                        @endif
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="label-2">Subcaste</label>
                                        <select class="form-control form-design-2 select2" name="subcaste">
                                            <option value="">-- Choose Subcaste --</option>
                                            @if($subcastes)
                                            @foreach ($subcastes as $subcaste)
                                                <option value="{{$subcaste->id}}">{{$subcaste->subcategory_name}}</option>
                                            @endforeach
                                        @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" required>
                                        <label class="form-check-label" for="flexCheckChecked">
                                          Accepted Terms & Conditions
                                        </label>
                                      </div>
                                    <button type="submit" class="btn btn-default btnstyle" style="margin:15px auto;display:block;width:200px;background-image: linear-gradient(to right, #98803b 0%, #98803b 41%, #b69972 100%);">Register Free</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

