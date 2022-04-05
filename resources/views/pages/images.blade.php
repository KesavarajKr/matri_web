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
            <div class="row mt-4">
                @if($errors->any())

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>


                @endif
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
                                <li class="menulist" style="background-color:#D1B162"><a class="menulink" href=""><img src="assets/images/Group_11.png" class="img-fluid"></a></li>
                                <li class="menulist" ><a class="menulink" href="/basicdetails"><img src="assets/images/Group_12.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/religion"><img src="assets/images/Group_13.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/location"><img src="assets/images/Group_14.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/professtional"><img src="assets/images/Group_15.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/family"><img src="assets/images/Group_16.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/preference"><img src="assets/images/Group_17.png" class="img-fluid"></a></li>
                                <li class="menulist"><a class="menulink" href="/horoscope"><img src="assets/images/Group_18.png" class="img-fluid"></a></li>
                            </ul>

                            <h3 style="font-weight:bold;margin-left:20px">Manage Your Photos</h3>

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h6 class="text-center mt-4" style="font-weight:bold">My Photos <span>{{$imgcount->count()}}</span></h6>
                                        <div class="imagecontainer" data-bs-toggle="modal" data-bs-target="#exampleModal">

                                            <div class="iconbox">
                                                <i class="bi bi-plus-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="text-center mt-4" style="font-weight:bold">My Videos <span>{{$videocount->count()}}</span></h6>
                                        <div class="imagecontainer" data-bs-toggle="modal" data-bs-target="#exampleModal1">

                                            <div class="iconbox">
                                                <i class="bi bi-plus-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="text-center mt-4" style="font-weight:bold">ID Proof & Religion Spec <span>{{$horoscopecount->count()}}</span></h6>
                                        <div class="imagecontainer" data-bs-toggle="modal" data-bs-target="#exampleModal2">

                                            <div class="iconbox">
                                                <i class="bi bi-plus-circle"></i>
                                            </div>
                                        </div>
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
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Your Photos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="/uploadimage" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">

                <input type="file" name="image" class="form-control " required>
                <input type="hidden" name="varanid" value="{{session('LoggedUser')}}">



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" style="background-color:#6d1140;border:0px">Upload Image</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Your Videos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

            <form method="POST" action="/uploadvideo" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                    <input type="file" name="video" class="form-control " required>
                    <input type="hidden" name="varanid" value="{{session('LoggedUser')}}">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" style="background-color:#6d1140;border:0px">Upload Video</button>
            </div>
        </form>


      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Horoscope Document</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="/uploadhoroscope" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
                <div class="form-group mb-4">
                    <label style="margin-bottom:10px;font-weight:bold">Select Your file</label>
                    <select class="form-control" name="horoscopetitle" required>
                        <option value="">-- Choose File --</option>
                        <option value="Horoscope file">Horoscope file</option>
                        <option value="Aadhar Card">Aadhar Card</option>
                        <option value="Driving License">Driving License</option>
                    </select>
                </div>
                <div class="form-group">
                    <label style="margin-bottom:10px;font-weight:bold">Horoscope File (Max File Size : 500KB)</label>
                    <input type="file" name="image" class="form-control " required>
                </div>

                <input type="hidden" name="varanid" value="{{session('LoggedUser')}}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" style="background-color:#6d1140;border:0px">Upload Horoscope File</button>
        </div>
    </form>

      </div>
    </div>
  </div>
