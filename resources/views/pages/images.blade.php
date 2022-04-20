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
                                <li class="menulist" ><a class="menulink" href="/aboutme"><i class="bi bi-card-text" style="color:#fff;font-size:25px" ></i></a></li>
                                <li class="menulist" style="background-color:#D1B162"><a class="menulink" href="/image"><i class="bi bi-card-image" style="color:#6d1140;font-size:25px"></i></a></li>
                                <li class="menulist"><a class="menulink" href="/basicdetails"><i class="bi bi-card-checklist" style="color:#fff;font-size:25px"></i> </a></li>
                                <li class="menulist"><a class="menulink" href="/religion"><i class="bi bi-bank2" style="color:#fff;font-size:25px"></i></a></li>
                                <li class="menulist"><a class="menulink" href="/location"><i class="bi bi-geo-alt-fill" style="color:#fff;font-size:25px"></i></a></li>
                                <li class="menulist"><a class="menulink" href="/professional"><i class="bi bi-bag-check-fill" style="color:#fff;font-size:25px"></i></a></li>
                                <li class="menulist"><a class="menulink" href="/family"><i class="bi bi-people-fill" style="color:#fff;font-size:25px"></i></a></li>
                                <li class="menulist"><a class="menulink" href="/preference"><i class="bi bi-person-lines-fill" style="color:#fff;font-size:25px"></i></a></li>
                                <li class="menulist"><a class="menulink" href="/horoscope"><i class="bi bi-snow" style="color:#fff;font-size:25px"></i></a></li>


                            </ul>

                            <h3 style="font-weight:bold;margin-left:20px">Manage Your Photos</h3>

                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h6 class="text-center mt-4" style="font-weight:bold">My Photos <span>{{$imgcount->count()}}</span></h6>
                                        <h6 style="text-align:center"><button data-bs-toggle="modal" data-bs-target="#imageview" class="btn btn-default btn-sm" style="background-color:#6d1140;color:#fff"><i class="bi bi-eye-fill"></i>&nbsp;&nbsp; View Images</button></h6>
                                        <div class="imagecontainer" data-bs-toggle="modal" data-bs-target="#exampleModal">

                                            <div class="iconbox">
                                                <i class="bi bi-plus-circle"></i>
                                                {{-- <i class="bi bi-eye-fill"></i> --}}
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="text-center mt-4" style="font-weight:bold">My Videos <span>{{$videocount->count()}}</span></h6>
                                        <h6 style="text-align:center"><button data-bs-toggle="modal" data-bs-target="#videoview" class="btn btn-default btn-sm" style="background-color:#6d1140;color:#fff"><i class="bi bi-eye-fill"></i>&nbsp;&nbsp; View Videos</button></h6>
                                        <div class="imagecontainer" data-bs-toggle="modal" data-bs-target="#exampleModal1">

                                            <div class="iconbox">
                                                <i class="bi bi-plus-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="text-center mt-4" style="font-weight:bold">ID Proof & Religion Spec <span>{{$horoscopecount->count()}}</span></h6>
                                        <h6 style="text-align:center"><button data-bs-toggle="modal" data-bs-target="#horoscopeview" class="btn btn-default btn-sm" style="background-color:#6d1140;color:#fff"><i class="bi bi-eye-fill"></i>&nbsp;&nbsp; View Details</button></h6>
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

<div class="modal fade" id="horoscopeview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">View Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Image Name</th>
                                        <th>File Type</th>
                                        <th>View</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($allhoroscope)
                                        @foreach ($allhoroscope as $horoscope)
                                            <tr>
                                                <td><img class="img-fluid" src="/images/{{$horoscope->img_name}}" style="width:70px"></td>
                                                <td>{{$horoscope->title}}</td>
                                                <td><a href="/images/{{$horoscope->img_name}}" target="_blank">{{$horoscope->title}}</a></td>
                                                <td>
                                                    <form method="POST" action="{{route('horoscope.destroy',$horoscope->id)}}" onsubmit="return confirm('Do You want Delete this Data?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger button"><i class="bi bi-trash-fill"></i></button>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>

      </div>
    </div>
  </div>

<div class="modal fade" id="imageview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">View Images</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
                <div class="container">
                    <div class="row">
                        @if($allimages)
                            @foreach ($allimages as $images)
                                <div class="col-lg-6">
                                    <div class="viewimg" style="position:relative;height:200px;border:1px solid #6d1140;border-radius:10px;margin:10px;">
                                        <img src="/images/{{$images->image_name}}" class="img-fluid m-auto d-block">
                                        <div class="delbtn">
                                            <form method="POST" action="{{route('image.destroy',$images->id)}}" onsubmit="return confirm('Do You want Delete this Data?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger button"><i class="bi bi-trash-fill"></i></button>
                                            </form>


                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="videoview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">View Images</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
                <div class="container">
                    <div class="row">
                        @if($allvideos)
                            @foreach ($allvideos as $video)
                                <div class="col-lg-12">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>Video Name</th>
                                                <th>Play</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<tr>
    <td>{{$video->video_name}}</td>
    <td><a href="/images/{{$video->video_name}}" target="_blank">{{$video->video_name}}</a></td>
    <td> <form method="POST" action="{{route('video.destroy',$video->id)}}" onsubmit="return confirm('Do You want Delete this Data?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger button"><i class="bi bi-trash-fill"></i></button>
    </form></td>
</tr>
                                        </tbody>
                                    </table>
                                    {{-- <div class="viewimg" style="position:relative;height:200px;border:1px solid #6d1140;border-radius:10px;margin:10px;">
                                        <a href="/images/{{$video->video_name}}" target="_blank">{{$video->video_name}}</a>
                                        <div class="delbtn">



                                        </div>
                                    </div> --}}

                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>

      </div>
    </div>
  </div>

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
                        <option value="Horoscope">Horoscope file</option>
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
