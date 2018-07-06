<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    @include('template.header'); <!--include-->
	
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ URL('/') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Custom Trip</li>
      </ol>


      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row col-md-12 mb-4">
	            <h4>Isi Form dibawah ini untuk request membuat trip versi kamu (custom)</h4>

        <div class="col-md-6 mb-4">
          <form name="sentMessage" id="contactForm" novalidate method="post" action="{{ URL('/') }}/customtrip/submit">
		  <input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">

            <div class="control-group form-group">
              <div class="controls">
                <label>First Name:</label>
                <input type="text" class="form-control" name="firstname" id="firstname" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Phone Number:</label>
                <input type="tel" class="form-control" name ="telp" id="phone" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Please enter your email address.">
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <label>Number of Travellers:</label>
				<div class="trav-num">
				 <label class="numtrav-text">Adults:</label><input class="inputtext" type="text" name="adult_num" id="adultnumber" required data-validation-required-message="Please enter your email address.">
	
				 <label class="numtrav-text">Children:</label><input class="inputtext" type="text" name="child_num" id="childnumber" required data-validation-required-message="Please enter your email address.">
	
				</div>

              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Special Request:</label>
                <textarea rows="6" cols="100" class="form-control" name="spes_req" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            <!-- For success/fail messages -->
        </div>
		<div class="col-md-6 mb-4">
            <div class="control-group form-group">
              <div class="controls">
                <label>Family Name:</label>
                <input type="text" class="form-control" id="familyname" name="familyname" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Destination:</label>
                <input type="text" class="form-control" name="destination" id="destination" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Departure Date:</label>
				<input type="date" class="form-control" name="departdate" id="departdate">
              </div>
            </div>
             <div class="control-group form-group">
              <div class="controls">
                <label>Prefered Hotel:</label>
					<div class="controls">
					
						<div class="trav-num">
						<label class="radio"><input type="radio" name="hoteltype">Premium</label>
						<label class="radio"><input type="radio" name="hoteltype">Deluxe</label>
						<label class="radio"><input type="radio" name="hoteltype">Standard</label>
						</div>
					</div>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <label>Prefered Airlines:</label>
                <input type="text" class="form-control" name="airline" id="airlines" required data-validation-required-message="Please enter your email address.">
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
			    <input type="checkbox" name="customagree" id="customagree" value="I have read and agreed terms &amp; conditions">
                <label>I have read and agreed terms & conditions</label>
              </div>
            </div>
			
			
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="sendCustomData" style="width:350px;">Submit Data</button>
          </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    @include('template.footer'); <!--include-->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script>
	var ss="{{ URL('/') }}";
	$.ajaxSetup({
	  headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});
	$(document).ready(function () {
		    $('[id^=phone]').keypress(validateNumber);
		    $('[id^=adultnumber]').keypress(validateNumber);
		    $('[id^=childnumber]').keypress(validateNumber);

		$('#sendCustomData').click(function () {
				var firstname=$("#firstname").val();
				var email=$("#email").val();
				var telp=$("#phone").val();
				var familyname=$("#familyname").val();
				var adult_num=$("#adultnumber").val();
				var child_num=$("#childnumber").val();
				var spes_req=$("#message").val();
				var destination=$("#destination").val();
				var depart_date=$("#departdate").val();
				var airline=$("#airlines").val();
				var _token=$("#_token").val();

				var hotel="cobaa";
				alert("yass"+_token);
				$("form").submit();

					
					
							
				
            });
	});
	
	function validateNumber(event) {
		var key = window.event ? event.keyCode : event.which;
		if (event.keyCode === 8 || event.keyCode === 46) {
			return true;
		} else if ( key < 48 || key > 57 ) {
			return false;
		} else {
			return true;
		}
	};
	
	function validateEmail(email) {
	  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  return re.test(email);
	}
	</script>
    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
  </body>

</html>
