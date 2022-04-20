<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.carousel.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.theme.default.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <title>@yield('title')</title>
  </head>
  <body>
@include('layouts.includes.header')

@section('main-content')

@show
@include('layouts.includes.footer')
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="assets/js/owl.carousel.js"></script>
    {{-- <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    -->
  </body>
</html>
<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6256dff27b967b11798a9233/1g0hlljmk';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
<script>
    $(document).ready(function(){

            $name = $(".name").val();
            $gender = $(".gender").val();
            $pnumber = $(".pnumber").val();

        $(".registerbtn").click(function(){

            $(".name2").val("data");
            window.location="/register";
        })
    });
</script>

<script>
    $(document).ready(function (){
                 var count = 30;
				//  var background =$('.col-lg-12')
                function myCount() {
                if (count < 0) {
                    count = 0;
                }
                $('#count').text(count);
                count --;
                $("#expired").hide();
				if(count == 0){
					// $('.count').hide(700);
					// $('.greeting').show(3000);
					// background.removeClass('stars');
					// background.addClass('crackers');
                    // $("#expired").hide();
                    $(".otpbtn").prop("disabled", true);

				};

            };


        setInterval(myCount,1000);
        });

    </script>

<script>
    $(".loginopen").click(function(){
            $(".right-sidebar").addClass('right-sidebar-open');
    });

    $(".closebtn").click(function(){
        $(".right-sidebar").removeClass('right-sidebar-open');
        $(".right-sidebar").addClass('right-sidebar-close');
    });
</script>
<script>
    $(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
  });
});
</script>

<script>
    document.addEventListener("contextmenu", function (e){
    e.preventDefault();
}, false);
</script>

<script>
    $(".Password").hide();
    $(".vendorlogo").hide();

    $(".vendortype").change(function(){
        vendortype = $(this).val();

        if(vendortype == 'Broker')
        {
            $(".Password").show();
            $(".vendorlogo").hide();

        }
        else
        {
            $(".Password").hide();
            $(".vendorlogo").show();
        }

    });
</script>


<script type="text/javascript">

    $('#contactForm').on('submit',function(e){
        e.preventDefault();

        let userid = $('#userid').val();
        let partnerid = $('#partnerid').val();
        let sendby = $('#sendby').val();
        let sendmessage = $('#sendmessage').val();

        $.ajax({
          url: '/storechat',
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            userid:userid,
            partnerid:partnerid,
            sendby:sendby,
            sendmessage:sendmessage,
          },
          success:function(response){

            $('#success-message').text(response.success);
            $("#contactForm")[0].reset();

            $("#appenddata").append(
                '<div class="alert" style="background-color:#E27B21;margin-bottom:0px" role="alert"><h6 class="text-white" style="font-size:16px;margin-bottom:0px">'+sendmessage+'</h6></div><p style="text-align:right;font-size:13px;margin-bottom:0px;font-weight:bold">Message Sent</p>'

                // '<div class="alert alert-success" role="alert">'+sendmessage+'</div>'
            );


         }
        });
    });
      </script>

<script>
   $(document).ready(function(){
        var partnerid = $("#partnerid").val();
        var sessionid = $("#userid").val();

        fetchChat();
        function fetchChat()
        {
            $.ajax({
            data:"_token": "{{ csrf_token() }}",
          url: '/getchat'+'/'+partnerid+'/'+sessionid,
          type:"POST",
          dataType:'json',
          success:function(response){


         }
        });
        }
   });
</script>

<script type="text/javascript">
function myFunction(event) {
  var x = event.which || event.keyCode;
//   alert(x);
  if(x == 97 || x == 98 || x == 99 || x == 100 || x == 101 || x == 102 || x == 103 || x == 104 || x == 105 || x == 106 || x ==107 || x == 108 || x == 109 || x == 110 || x == 111 || x == 112 || x == 113 || x == 114 || x == 115|| x == 116|| x == 117|| x == 118|| x == 119|| x == 120|| x == 121|| x == 122)
       {
           alert("Do Not Use Letters Only Number Allowed");
           return false;
       }

}

</script>


