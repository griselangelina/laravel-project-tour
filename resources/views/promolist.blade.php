<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/') }}vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/') }}css/modern-business.css" rel="stylesheet">

  </head>
  <script>
  function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
}
	function ajaxCounrtyFilter(id,listType){
		$("#select").html(capitalize(id));

		$.ajax({
          url: 'http://localhost/grisell/public/getlistproduct/'+listType+'/'+id,
          type: "get",
           success: function(data){ // What to do if we succeed
				$("#listproduct").html("");
				var list="";
				if(data.length>0){
					
					for(var o=0;o<data.length;o++){
						list+='<div class="col-lg-4 col-sm-6 portfolio-item">			  <div class="card">				<a href="#"><img class="card-img-top" src="'+data[o].img_url +'" alt=""></a>				  <h5 class="card-title">					<a href="#"><strong>'+data[o].prd_nm+'</strong></a>				  </h5>				<div class="card-body">				  <p class="card-text">Mulai dari (/orang)</p>				<span class="price big-price">Rp '+data[o].price+'</span>				</div>				<div class="card-footer">				  <a href="#" class="btn btn-primary">Learn More</a>				</div>			  </div>			</div>';
					}
					$("#listproduct").html(list);
					
			   }else{
				  $("#listproduct").html("No Data");

			   }
		   }
        });
	};
  </script>
  <body>

    <!-- Navigation -->
	@include('template.header') <!--include-->


    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
            <div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>This is a description for the first slide.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Second Slide</h3>
              <p>This is a description for the second slide.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Third Slide</h3>
              <p>This is a description for the third slide.</p>
            </div>
          </div>
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
      <!-- /.row -->

      <!-- Portfolio Section -->
	  <div class="header-img">
	     <img src="{{ asset('/') }}img/savegambar.jpg">
	  </div>
 <div class="home-part alt bg-white">
		  <div class="container">
		 
		  <center>
			<div class="menuTitle-alt"><p>Our Latest Promotion</p></div>
		  </center>

		  <div class="row" id="listproduct">
		 
		 
		 
						  <!-- Marketing Icons Section -->
						  <div class="row">
						  @foreach ($promolist as $promolist)
							<div id="owl-two" class="col-md-4" style="display: block;">
								<div class="item thumbnail pad-slide" style="padding:0px;">
									<div class="">
									  <div class="card h-100">
										<a href="{{ URL('/') }}/{{str_replace(' ', '',$promolist->promo_url)}}"><img src={{$promolist->promo_img}} class="card-img"></a>
									  </div>
									</div>
								</div>
							</div>
						@endforeach

						   </div>
							
					
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		  </div>
		  </div>
	  </div>
      <!-- /.row -->

      
      <!-- /.row -->

      <hr>



    </div>
    <!-- /.container -->

    <!-- Footer -->
	@include('template.footer') <!--include-->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
