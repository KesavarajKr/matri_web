<header>
    <nav class="navbar navbar-expand-lg navbar-light navbar-design fixed-top">
    <div class="container-fluid">
        <img src="../assets/images/LOGO_for App.png" style="width:100px;margin-left:40px" class="img-fluid navbar-brand">
      <!-- <a class="navbar-brand" href="#">Navbar</a> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#"><i style="color:#fff" class="bi bi-globe"></i>&nbsp;&nbsp;English</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i style="color:#fff" class="bi bi-globe"></i>&nbsp;&nbsp;Premium</a>
          </li>
          @if(session('LoggedUser') == "")

            @else
            <li class="nav-item">
                <a class="nav-link" href="/newmatches"><i style="color:#fff" class="bi bi-people-fill"></i>&nbsp;&nbsp;Matches</a>
              </li>
          @endif

          <li class="nav-item">
            <a class="nav-link" href="#"><i style="color:#fff" class="bi bi-headset"></i>&nbsp;&nbsp;Support</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i style="color:#fff" class="bi bi-search"></i>&nbsp;&nbsp;Search</a>
          </li>
          <div class="d-flex">
              @if(session('LoggedUser') == "")
                <a class="loginbtn" href="/login"><b>Login</b></a>
                @else
                <a class="loginbtn loginopen" ><b>{{session('LoggedUser')}}</b></a>
              @endif


        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->

  </div>

        </ul>

      </div>
    </div>
  </nav>
  </header>

  <div class="right-sidebar">
      <div class="top-head">
            <div class="">
                <h3 class="closebtn">X</h3>
            </div>
            <div class="profileimg">
                <img src="https://www.freeiconspng.com/uploads/customers-icon-3.png" class="img-fluid">

            </div>

      </div>
      <div class="bottom-content">
            <ul class="sidebar-list">
                <li><a href="/aboutme"><i class="bi bi-person-circle"></i>Edit Profile</a></li>
                <li><a href=""><i class="bi bi-bell-fill"></i>Notifications</a></li>
                <li><a href=""><i class="bi bi-people-fill"></i>Matches</a></li>
                <li><a href=""><i class="bi bi-person-heart"></i>Favourite People</a></li>
                <li><a href=""><i class="bi bi-person-heart"></i>Upgrade Premium</a></li>
                <li><a href=""><i class="bi bi-headset"></i>Contact Us</a></li>
                <li><a href=""><i class="bi bi-person-bounding-box"></i>Privacy</a></li>
                <li><a href=""><i class="bi bi-sliders"></i>Settings</a></li>
                <li><a href=""><i class="bi bi-share-fill"></i>Share</a></li>
                <li><a href="/logout"><i class="bi bi-power"></i>Logout</a></li>
            </ul>
      </div>


  </div>

  <a href="https://api.whatsapp.com/send?phone=+91 8973589036" title="whatsapp" class="btn btn-default whatsapp-btn">
    <i class="bi bi-whatsapp"></i>
</a>
<div class="social">
    <ul>
      <li class="twitter"><a href="https://codepen.io/collection/XdWJOQ/">Twitter<i class="bi bi-twitter" aria-hidden="true"></i></a></li>
      <li class="facebook"><a href="https://codepen.io/collection/XdWJOQ/">Facebook<i class="bi bi-facebook" aria-hidden="true"></i></a></li>
      {{-- <li class="google-plus"><a href="https://codepen.io/collection/XdWJOQ/">Google plus<i class="fa fa-google-plus" aria-hidden="true"></i></a></li> --}}
      <li class="instagram"><a href="https://codepen.io/collection/XdWJOQ/">Instagram<i class="bi bi-instagram" aria-hidden="true"></i></a></li>
      <li class="instagram"><a href="https://codepen.io/collection/XdWJOQ/">Youtube<i class="bi bi-youtube" aria-hidden="true"></i></a></li>
      <li class="instagram"><a href="tel:+91-8973589036">Support<i class="bi bi-headset" aria-hidden="true"></i></a></li>
    </ul>
</div>
