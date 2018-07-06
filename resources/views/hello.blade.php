<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Glorious Travel Site</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
	<link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="owlcarousel/owl.carousel.js"></script>

  </head>
  <script>
  
  </script>
  <body>

    <!-- Navigation -->
    	@include('template.header') <!--include-->


    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
		@foreach ($banner as $banner2)
		@if ($loop->first)
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		@else         
				<li data-target="#carouselExampleIndicators" data-slide-to="{{$banner2->id}}"></li>
		@endif
		 @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
		  @foreach($banner as $banner)
		  @if ($loop->first)
			  <div class="carousel-item active">
			<img src={{$banner->banner_image}}>
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
		  @else
          <div class="carousel-item">
			<img src={{$banner->banner_image}}>
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
		  @endif

		  @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
	<div class="container">

	<div class="menuWrap">
				<ul>
					<li class="on"><a data-target="#sec1">Hot Destinations</a></li>
					<li><a data-target="#sec2">Best Package Deals</a></li>
					<li><a data-target="#sec3">Other</a></li>
				</ul>
	</div>
	</div>
	
	<section id="sec1">
	<div class="home-part">
		<div class="container">
			 <center>
			  <div class="menuTitle"><p>Hot Destinations</p></div>
			</center>
			  <!-- Marketing Icons Section -->
			  <div class="row">
				<div id="owl-two" class="owl-carousel owl-product owl-theme owl-loaded owl-responsive-960" style="display: block;">
				@foreach ($post2 as $post2)
					<div class="item thumbnail pad-slide" style="padding:0px;">
						<div class="">
						  <div class="card h-100">
							<a href="{{ URL('/') }}/{{str_replace(' ', '',$post2->cd)}}"><img src={{$post2->image}} class="card-img"></a>
						  </div>
						</div>
					</div>
				@endforeach
				</div>
			   </div>
				
		</div>
	</div>
	</section>
      <!-- /.row -->

      <!-- Portfolio Section -->
	  <section id="sec2">
	  <div class="home-part alt bg-gray">
		  <div class="container">
		  <center>
			<div class="menuTitle-alt"><p>Best Package Deals</p></div>
		  </center>

		  <div class="row" id="owlowl">
			<div id="owl-one" class="owl-carousel owl-product owl-theme owl-loaded owl-responsive-960" style="display: block;">
			@foreach ($post1 as $post1)
				<div class="item thumbnail pad-slide" style="padding:0px;">
					<div class="">
					  <div class="card maxwidth">
						<a href="#"><img class="card-img-top" src={{ $post1->img_url }} alt=""></a>
						  <h5 class="card-title bg-dark">
							<a href="about"><strong>{{ $post1->prd_nm }}</strong></a>
						  </h5>
						<div class="card-body">
						  <p class="card-text">Mulai dari (/orang)</p>
						<span class="price big-price">Rp {{ $post1->price }}</span>
						</div>
						<div class="card-footer">
						  <a href="{{ URL('/') }}/tour/{{ $post1->prd_als_nm }}" class="btn btn-primary">Learn More</a>
						</div>
					  </div>
					</div>
				</div>
			@endforeach	
			</div>
			
			
			
			
			

		  </div>
		  </div>
	  </div>
	  </section>
      <!-- /.row -->

      <!-- Features Section -->
	  <section id="sec3">
	  	<div class="home-part">
		<div class="container">
			 <center>
			  <div class="menuTitle"><p>Hot Destinations</p></div>
			</center>
			  <!-- Marketing Icons Section -->
			  <div class="row">
				<div class="col-lg-3 col-sm-6 padding-grid">
				  <div class="card h-100">
					<a href="listproduct"><img src="img/hoo.jpg" class="card-img"></a>
				  </div>
				</div>
				<div class="col-lg-3 col-sm-6 padding-grid">
				  <div class="card h-100">
					<img src="img/hoo.jpg" class="card-img">

				  </div>
				</div>
				<div class="col-lg-3 col-sm-6 padding-grid">
				  <div class="card h-100">
					<img src="img/hoo.jpg" class="card-img">
				  </div>
				</div>
				<div class="col-lg-3 col-sm-6  padding-grid">
				  <div class="card h-100">
					<img src="img/hoo.jpg" class="card-img">
				  </div>
				</div>
			  </div>
		  </div>
		</div>
	  </section>
      <!-- /.row -->


      <!-- Call to Action Section -->
	  

    </div>
    <!-- /.container -->

    <!-- Footer -->
	@include('template.footer')<!--include-->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	 <script>
	 	var ss="{{ URL('/') }}";

            $(document).ready(function() {

			$('#berlanggananID').click(function () {
				
				var emailSubs=$("input[name*='txtEmailSubscribe']").val();
				
				if(emailSubs==""){
					alert("Nama, Email dan Telephone harus di isi");
				}else{
				 $.ajax({
						/* the route pointing to the post function */
						url: ss+'/footer/emailsubscribe',
						method: 'GET',
						/* send the csrf-token and the input to the controller */
						data: {_token: '{!! csrf_token() !!}',emailsubs: emailSubs},
						dataType: 'JSON',
						/* remind that 'data' is the response of the AjaxController */
						success: function (data) { 
						alert(data);
							if(data.status=="success"){
								alert("sukses");
							}else if(data.status=="fail"){
								alert("error email lolll");
							}
						}
					}); 
				}
			});
	//var=$(window).width(); // buat tau ukuran layar
			  var owl2 = $('#owl-two');
			  var owl= $('#owl-one');
			  
			   owl.owlCarousel({
                loop: true,
                margin: 5,
                navRewind: false,
                responsive: {
                  0: {
                    items: 4
                  },
                  600: {
                    items: 4
                  },
                  1000: {
                    items: 2
                  }
                }
              })
			   owl2.owlCarousel({
                loop: true,
                margin: 5,
                navRewind: false,
                responsive: {
                  0: {
                    items: 4
                  },
                  600: {
                    items: 4
                  },
                  1000: {
                    items: 4
                  }
                }
              })
			  
            })
          </script>
	<script type="text/javascript">
		
$(function(){
    var lastId = '',
       menuPosition = 588,
       menuSelector = $(".menuWrap"),
       menuWrapSelector = $(".menuWrap"),
       topMenuHeight = menuSelector.outerHeight()+63,
       menuItems = menuSelector.find("a"),
       scrollItems = menuItems.map(function(){
             var item = $($(this).attr("data-target"));
             if (item.length) { return item; }
       });


    menuItems.click(function(e){
       e.preventDefault();
       var href = $(this).attr("data-target"),
           offsetTop = $(href).offset().top-topMenuHeight+2;

       if(!menuWrapSelector.hasClass("fixed")) {
          offsetTop -= 95;
       }

      $('html, body').stop().animate({ 
          scrollTop: offsetTop
      }, 300);
    });


    jQuery(window).scroll(function(){ 
       var sct=(document.body.scrollTop)? document.body.scrollTop : document.documentElement.scrollTop;   

       if (menuPosition > sct) {
          menuWrapSelector.removeClass('fixed');
          $('.menupromozone li:first-child').addClass("p'");
       }
       else {
          menuWrapSelector.addClass('fixed');
       }

       var fromTop = $(this).scrollTop()+topMenuHeight;
       var cur = scrollItems.map(function(){
          if ($(this).offset().top < fromTop)
             return this;
          });

       cur = cur[cur.length-1];
       var id = cur && cur.length ? cur[0].id : "";
		

       if (lastId !== id) {
           lastId = id;
           if(id==""){id="sec1";}
           // Set/remove active class
           menuItems
             .parent().removeClass("active")
             .end().filter("[data-target=#"+id+"]").parent().addClass("active");
          }  

    });
 })
	</script>
  </body>

</html>
