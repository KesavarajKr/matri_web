@extends('layouts.default')
@section('title','Varan Matrimony')
@section('main-content')

        <section class="myprofile-section" >

            <div class="container">
                <div class="register-inner">
                    <div class="row">


                        <div class="col-lg-10 offset-lg-1">
                            <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Interest ({{$interestcount}})</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Accept ({{$acceptedinterest->count()}})</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Reject ({{$rejectinterest->count()}})</button>
                                </li>
                              </ul>
                              <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="container mt-5">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card" style="background-color:#6d1140;border-radius:10px;">
                                                    <div class="card-body">
                                                        <a href="/receivedinterest" style="text-decoration:none">
                                                <div class="interestbox" >
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <h3><i class="bi bi-person-plus-fill"></i>                                                            </h3>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <h4 style="font-weight:bold" class="text-white">Received</h4>

                                                            <h6 class="text-white" style="margin-top:20px;font-size:22px;font-weight:bold">
                                                                @if($interestcount)
                                                                    {{$interestcount}}
                                                                    @else
                                                                    0
                                                                @endif
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            </div>
                                        </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card" style="background-color:#6d1140;border-radius:10px;">
                                                    <div class="card-body">
                                                        <a href="/sendinterest" style="text-decoration:none">
                                                <div class="interestbox">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <h3><i class="bi bi-person-plus-fill"></i>                                                            </h3>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <h4 style="font-weight:bold" class="text-white">Sent</h4>
                                                            <h6 class="text-white" style="margin-top:20px;font-size:22px;font-weight:bold">{{$sendinterest}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                        </a>
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    @if($acceptedinterest)
                                    @foreach ($acceptedinterest as $profiles)
                                    <div class="matches-container bg-white">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-4 ">
                                                    @if($profiles->imageview == '0')
                                                    <div class="matchimg">
                                                        <img src="../images/{{$profiles->image_name}}" class="img-fluid">
                                                        </div>
                                                        @else
                                                        <div class="matchimg">
                                                            <img src="../assets/images/imagelocked.png" class="img-fluid">
                                                            </div>
                                                    @endif

                                                </div>
                                                <div class="col-lg-8">
                                                    <h3 class="profile-name">{{$profiles->Name}}<sub>{{$profiles->varan_id}}</sub></h3>
                                                    <table class="table table-bordered mt-4">
                                                        <tr>
                                                            <th class="profilematches"><img src="assets/images/Vector.png" class="img-fluid" style="width:30px"><span class="">{{$profiles->age}} Years</span></th>
                                                            <th class="profilematches"><img src="assets/images/subcaste.png" class="img-fluid" style="width:30px"><span class="">{{$profiles->subcategory_name}}</span></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="profilematches"><img src="assets/images/occupation.png" class="img-fluid" style="width:30px"><span class="">
                                                                @if($profiles->name == "")
                                                                    Nill
                                                                    @else
                                                                    {{$profiles->name}}
                                                                @endif
                                                            </span></th>
                                                            <th class="profilematches"><img src="assets/images/location.png" class="img-fluid" style="width:30px"><span class="">

                                                                @if($profiles->state_name == "")
                                                                    Nill
                                                                    @else
                                                                    {{$profiles->state_name}}
                                                                @endif
                                                            </span></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="profilematches"><img src="assets/images/education.png" class="img-fluid" style="width:30px"><span class="">
                                                                @if($profiles->eduname == "")
                                                                Nill
                                                                @else
                                                                {{$profiles->eduname}}
                                                            @endif
                                                            </span></th>
                                                            <th class="profilematches"><img src="assets/images/religion.png" class="img-fluid" style="width:30px"><span class="">
                                                                @if($profiles->religion_name == "")
                                                                Nill
                                                                @else
                                                                {{$profiles->religion_name}}
                                                            @endif
                                                            </span></th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cardbottom">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-3">

                                                        @if($profiles->fav == 0)

                                                        <form method="POST" action="/addFavourite">
                                                            @csrf
                                                            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                                                            <input type="hidden" name="partnervaranid" value="{{$profiles->varan_id}}">
                                                            <input type="hidden" name="status" value="liked">
                                                            <button type="submit" class="btn btn-default"><img src="assets/images/favourite.png" style="width:30px" class="img-fluid"><span>Add to Favourite</span></button>
                                                        </form>
                                                        @else

                                                        <form method="POST" action="/addFavourite">
                                                            @csrf
                                                            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                                                            <input type="hidden" name="partnervaranid" value="{{$profiles->varan_id}}">
                                                            <input type="hidden" name="status" value="liked">
                                                            <button type="submit" class="btn btn-default"><img src="assets/images/favourite.png" style="width:30px" class="img-fluid"><span>Already in Favourite</span></button>
                                                        </form>
                                                    @endif
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <a href="{{route('bio.show',$profiles->id)}}" class="btn btn-default"><img src="assets/images/viewprofile.png" style="width:30px" class="img-fluid"><span>View Profile</span></a>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <form method="POST" action="/acceptinterest">
                                                            @csrf
                                                            <input type="hidden" name="userid" value="{{$profiles->varan_id}}">
                                                            <button type="submit" class="btn btn-default"><img src="assets/images/ignore.png" style="width:30px" class="img-fluid"><span>Accept </span></button>
                                                        </form>

                                                    </div>
                                                    <div class="col-lg-3">
                                                        <button class="btn btn-default"><img src="assets/images/ignore.png" style="width:30px" class="img-fluid"><span>Reject</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    @if($rejectinterest)
                                    @foreach ($rejectinterest as $profiles)
                                    <div class="matches-container bg-white">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-4 ">
                                                    @if($profiles->imageview == '0')
                                                    <div class="matchimg">
                                                        <img src="../images/{{$profiles->image_name}}" class="img-fluid">
                                                        </div>
                                                        @else
                                                        <div class="matchimg">
                                                            <img src="../assets/images/imagelocked.png" class="img-fluid">
                                                            </div>
                                                    @endif

                                                </div>
                                                <div class="col-lg-8">
                                                    <h3 class="profile-name">{{$profiles->Name}}<sub>{{$profiles->varan_id}}</sub></h3>
                                                    <table class="table table-bordered mt-4">
                                                        <tr>
                                                            <th class="profilematches"><img src="assets/images/Vector.png" class="img-fluid" style="width:30px"><span class="">{{$profiles->age}} Years</span></th>
                                                            <th class="profilematches"><img src="assets/images/subcaste.png" class="img-fluid" style="width:30px"><span class="">{{$profiles->subcategory_name}}</span></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="profilematches"><img src="assets/images/occupation.png" class="img-fluid" style="width:30px"><span class="">
                                                                @if($profiles->name == "")
                                                                    Nill
                                                                    @else
                                                                    {{$profiles->name}}
                                                                @endif
                                                            </span></th>
                                                            <th class="profilematches"><img src="assets/images/location.png" class="img-fluid" style="width:30px"><span class="">

                                                                @if($profiles->state_name == "")
                                                                    Nill
                                                                    @else
                                                                    {{$profiles->state_name}}
                                                                @endif
                                                            </span></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="profilematches"><img src="assets/images/education.png" class="img-fluid" style="width:30px"><span class="">
                                                                @if($profiles->eduname == "")
                                                                Nill
                                                                @else
                                                                {{$profiles->eduname}}
                                                            @endif
                                                            </span></th>
                                                            <th class="profilematches"><img src="assets/images/religion.png" class="img-fluid" style="width:30px"><span class="">
                                                                @if($profiles->religion_name == "")
                                                                Nill
                                                                @else
                                                                {{$profiles->religion_name}}
                                                            @endif
                                                            </span></th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cardbottom">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-3">

                                                        @if($profiles->fav == 0)

                                                        <form method="POST" action="/addFavourite">
                                                            @csrf
                                                            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                                                            <input type="hidden" name="partnervaranid" value="{{$profiles->varan_id}}">
                                                            <input type="hidden" name="status" value="liked">
                                                            <button type="submit" class="btn btn-default"><img src="assets/images/favourite.png" style="width:30px" class="img-fluid"><span>Add to Favourite</span></button>
                                                        </form>
                                                        @else

                                                        <form method="POST" action="/addFavourite">
                                                            @csrf
                                                            <input type="hidden" name="uservaranid" value="{{session('LoggedUser')}}">
                                                            <input type="hidden" name="partnervaranid" value="{{$profiles->varan_id}}">
                                                            <input type="hidden" name="status" value="liked">
                                                            <button type="submit" class="btn btn-default"><img src="assets/images/favourite.png" style="width:30px" class="img-fluid"><span>Already in Favourite</span></button>
                                                        </form>
                                                    @endif
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <a href="{{route('bio.show',$profiles->id)}}" class="btn btn-default"><img src="assets/images/viewprofile.png" style="width:30px" class="img-fluid"><span>View Profile</span></a>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <form method="POST" action="/acceptinterest">
                                                            @csrf
                                                            <input type="hidden" name="userid" value="{{$profiles->varan_id}}">
                                                            <button type="submit" class="btn btn-default"><img src="assets/images/ignore.png" style="width:30px" class="img-fluid"><span>Accept </span></button>
                                                        </form>

                                                    </div>
                                                    <div class="col-lg-3">
                                                        <button class="btn btn-default"><img src="assets/images/ignore.png" style="width:30px" class="img-fluid"><span>Reject</span></button>
                                                    </div>
                                                </div>
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


