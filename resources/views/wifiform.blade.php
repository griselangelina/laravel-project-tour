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
        <li class="breadcrumb-item active">Service</li>
		<li class="breadcrumb-item active">Wifi</li>
      </ol>


      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Send us a Message</h3>
          <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name:</label>
                <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Phone Number:</label>
                <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Message:</label>
                <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
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
	$(document).ready(function () {
		
		$('#sendMessageButton').click(function () {
				var txtName=$("#name").val();
				var txtEmail=$("#email").val();
				var txtPhone=$("#phone").val();
				var txtmessage=$("#message").val();
				
				if(txtName=="" ||txtEmail=="" || txtPhone=="" || txtmessage==""){
					alert("Nama, Email, Telephone dan Message harus di isi");
				}else{
				alert("yaasss");

				 $.ajax({
						/* the route pointing to the post function */
						url: ss+'/about/message',
						method: 'POST',
						/* send the csrf-token and the input to the controller */
						data: {_token: '{!! csrf_token() !!}',nama: txtName, email:txtEmail,telp:txtPhone,spes_req:txtmessage},
						dataType: 'JSON',
						/* remind that 'data' is the response of the AjaxController */
						success: function (data) { 
						alert(data);
							if(data.status=="success"){
								alert("suskes");
							}else if(data.status=="fail"){
								alert("gagal");
							}
						}
					}); 
				}
				
				
				
            });
	});
	</script>
    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
  </body>

</html>
