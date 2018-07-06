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
    <link href="{{ URL('/') }}/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL('/') }}/css/modern-business.css" rel="stylesheet">

  </head>

  <script>
	function formatCurrency(amount, decimalSeparator, thousandsSeparator, nDecimalDigits){  
    var num = parseFloat( amount ); //convert to float  
    //default values  
    decimalSeparator = decimalSeparator || '.';  
    thousandsSeparator = thousandsSeparator || ',';  
    nDecimalDigits = nDecimalDigits == null? 2 : nDecimalDigits;  
  
    var fixed = num.toFixed(nDecimalDigits); //limit or add decimal digits  
    //separate begin [$1], middle [$2] and decimal digits [$4]  
    var parts = new RegExp('^(-?\\d{1,3})((?:\\d{3})+)(\\.(\\d{' + nDecimalDigits + '}))?$').exec(fixed);   
  
    if(parts){ //num >= 1000 || num < = -1000  
        return parts[1] + parts[2].replace(/\d{3}/g, thousandsSeparator + '$&') + (parts[4] ? decimalSeparator + parts[4] : '');  
    }else{  
        return fixed.replace('.', decimalSeparator);  
    }  
}  
  </script>
  <body>

    <!-- Navigation -->
	@include('template.header') <!--include-->



    <!-- Page Content -->
      <!-- /.row -->

      <!-- Portfolio Section -->

	  <div class="home-part">
		  <div class="container">
		  <div class="row">
		  <div class="col-md-12 col-xs-12">
		  <ul class="breadcrumb">
			<li>
				Home
			</li>
			<li>
				Kategori 1
			</li>
			<li>
				Kategori 2
			</li>
		  </ul>
			<div id="detail-header">
				<a href="#"><img src="{{ URL('/') }}/img/savegambar.jpg"></a>
		    </div>
		  </div>
		  </div>
		  
		  <div class="row">

		    <div class="col-md-9 col-sm-12" >				
				<div id="detail-body-title">
						<div class="row">
							<div class="col-sm-12">
								<div class="detail-title">
									<h3>{{$product[0]->prd_nm}}</h3>
								</div>
							</div>
						</div>
				</div>	
				<div id="detail-body-content">
						<div class="row">
							<div class="col-sm-12 col-md-12">
								<ul class="detail-nav">
									<li class="active">
										<a data-target="#detail-ringkasan" data-toggle="tab" aria-expanded="true" >Ringkasan tour </a>
									</li>
									<li class="">
										<a data-target="#detail-itinerary" data-toggle="tab" aria-expanded="false">Itinerary </a>
									</li>
								</ul>
								<div class="detail-content ">
									<div class="detail-pane active" id="#detail-ringkasan">
										<div class="row">
											<div class="col-sm-12">
												<div class="summary-route">
													<h2 class="title-blue">
														Rute Perjalanan
													</h2>
													<div class="row">
														<div class="col-sm-6">
															<div class="list-route">
																<ul>
																	@foreach($productdetail as $productdetail)
																	{!! $productdetail->inclusion!!}
																	@endforeach
																</ul>
																	
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="detail-pane" id="#detail-itinerary">
										<div class="row">
											<div class="col-sm-12">
												@foreach($productitin as $productitin)
													<div class="itinerariesCont">
				                                        <div class="DayItin">Day {{$productitin->day}}</div><div class="block-itiner"> {{$productitin->itin_title}}</div>
			                                         </div>
													 
												{{$productitin->itin_text}}
												<br>
												<br>
												@endforeach											
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>
			  
			</div>
			<div class="col-md-3 col-sm-12 portfolio-item">
			
			    <div class="detail-body-right">
				  <div class="detail-price">
				  
						<center><p>Harga (/orang)</p></center>
						<center><h3>Rp {{$product[0]->price}}</h3></center>
				  </div>
				  <div class="box-border">
                    <a href="javascript:" class="print"><i class="fa fa-print"></i> Cetak Itinerary</a>
                    <a href="{{ URL('/') }}/download/page.txt" class="download"><i class="fa fa-envelope-o"></i> Download</a>
                </div>
				<div class="box-border">
                    <a href="javascript:" class="book-submit"><i class="fa fa-print"></i> Pesan Sekarang</a>
                </div>
				</div>
			</div>
			 </div>
		  </div>
		  </div>
		  
		  <div class="modal" id="modal-data">
			<div class="popUpLarge shadowNone">
				<div class="openPopupSmall">
					<form method="post" name="bookForm">
            <div class="divForm">
				<div id="loading">
				</div>
				<hgroup>
                <h3 class="titleBooking">Data Pemesan</h3>
				<a href="javascript:void('0');" onclick="javascript:closeDetail();" class="btnClose">X</a>
				</hgroup>
                <table width="100%" cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td width="170"><label>Nama Lengkap</label> <sup class="required">*</sup></td>
                </tr>
                <tr>
                    <td class="controls"><input type="text" name="txtName" value="" class="formslc col-md-12 col-sm-12 col-xs-11" onkeypress="if ((event.keyCode > 32 &amp;&amp; event.keyCode < 48) || (event.keyCode > 57 &amp;&amp; event.keyCode < 65) || (event.keyCode > 90 &amp;&amp; event.keyCode < 97)) event.returnValue = false;"></td>
                </tr>
                <tr>
                    <td class="controls"><label>Email</label> <sup class="required">*</sup></td>
                </tr>
                <tr>
                    <td class="controls"><input type="email" name="txtEmail" value="" class="formslc col-md-12 col-sm-12 col-xs-11" onkeypress="if ((event.keyCode > 32 &amp;&amp; event.keyCode < 46) || (event.keyCode > 57 &amp;&amp; event.keyCode < 64) || (event.keyCode > 90 &amp;&amp; event.keyCode < 95) || event.keyCode == 47 || event.keyCode == 96) event.returnValue = false;"></td>
                </tr>
                <tr>
                    <td class="controls"><label>Phone</label> <sup class="required">*</sup></td>
                </tr>
                <tr>
                    <td class="controls"><input type="tel" name="txtPhone" value="" class="formslc col-md-12 col-sm-12 col-xs-11" onkeypress="if (event.keyCode < 40 || event.keyCode > 57 || (event.keyCode==42 || event.keyCode==46)) event.returnValue = false;"></td>
                </tr>	
                <tr>
                    <td class="controls"><label>Keterangan/Special Request</label></td>
                </tr>
                <tr>
                    <td class="controls"><textarea id="txtSpecialRequest" name="txtSpecialRequest" class="formslc col-md-12 col-sm-12 col-xs-11" style="height: 70px;" onkeypress="if (event.keyCode < 32 || event.keyCode > 125 || event.keyCode == 34 || event.keyCode == 42 || event.keyCode == 60 || event.keyCode == 62 || event.keyCode == 64 || event.keyCode == 94 || event.keyCode == 96) event.returnValue = false;"></textarea>
                    <input type="hidden" name="cmbOffice" value="1">
                    </td>
                </tr>
            </tbody></table>
			<a class="btn btn-primary btn-register" href="#">Submit Data</a>
            </div>
            <input type="hidden" name="op" value="14200"><input type="hidden" name="itemid" value="0"><input type="hidden" name="slcChild" value="0"><input type="hidden" name="id" value="3127"><input type="hidden" name="txtCheckIn" value="6/13/2018"><input type="hidden" name="slcAdult" value="2"><input type="hidden" name="formtype" value="tpackage">
            <input type="hidden" name="action" value="submit">
            <input type="hidden" name="tokenid" id="tokenid">
		</form>

				
				</div>
			</div>
		  </div>
		  
		  
		  
		  
		   <div class="modal" id="modal-konfirmasi">
			<div class="popUpLarge shadowNone">
				<div class="openPopupSmall">
					<div class="divForm">
				<hgroup>
                <h3 class="titleBooking">Halaman Info</h3>
				<a href="javascript:void('0');" onclick="javascript:closeDetail();" class="btnClose">X</a>
				</hgroup>
                <table width="100%" cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td width="170"><p>Terima Kasih telah kirim data. Tim akan segera melakukan pengecekan 1x24 jam. Silahkan cek email <p id="emailresult"></p>untuk konfirmasi</p></td>
                </tr>
                
            </tbody></table>
			  <a class="btn btn-primary btn-ok" href="#" style="width:100px; display:block; margin:0 auto;">OK</a>

            </div>
           
				</div>
			</div>
		  </div>
      <!-- /.row -->

      
      <!-- /.row -->


    <!-- /.container -->

    <!-- Footer -->
	@include('template.footer') <!--include-->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL('/') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ URL('/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
	var ss="{{ URL('/') }}";
	var prdId='{{$product[0]->prd_id}}';
	var price='{{$product[0]->price}}';

	$.ajaxSetup({
	  headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});
	 $(document).ready(function () {
		 var cur=formatCurrency(price, ",", ".", 0);
		 	$(".detail-price h3").html("Rp "+cur);
		$().hide
		 
		 var selector= $(".detail-nav").find("a");
           selector.click(function () {
                selector.parent().removeClass("active"); // gets innerHTML of clicked li				
				
				var datatarget= $(this).attr("data-target");
				$(this).parent().addClass("active");
				
				tabcontent = document.getElementsByClassName("detail-pane");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
	           document.getElementById(datatarget).style.display = "block";

            });
			
			$('.book-submit').click(function () {
				$('#modal-data').addClass("on");
            });
			$('.btnClose').click(function () {
				$('.modal').removeClass("on");
            });
			$('.btn-register').click(function () {
				$("#loading").css("display","block");
				var txtName=$("input[name*='txtName']").val();
				var txtEmail=$("input[name*='txtEmail']").val();
				var txtPhone=$("input[name*='txtPhone']").val();
				var txtSpecialRequest=$("#txtSpecialRequest").val();
				
				if(txtName=="" ||txtEmail=="" || txtPhone=="" ){
					alert("Nama, Email dan Telephone harus di isi");
				}else{
				 $.ajax({
						/* the route pointing to the post function */
						url: ss+'/tour/submit/postsubmittour',
						method: 'POST',
						/* send the csrf-token and the input to the controller */
						data: {_token: '{!! csrf_token() !!}',nama: txtName, email:txtEmail,telp:txtPhone,spes_req:txtSpecialRequest,prdId:prdId},
						dataType: 'JSON',
						/* remind that 'data' is the response of the AjaxController */
						success: function (data) { 
							if(data.status=="success"){
								$("#loading").css("display","none");
								$('#modal-data').removeClass("on");
								$('#modal-konfirmasi').addClass("on");
								$('#emailresult').html(data.email);
							}else if(data.status=="fail"){
								$("#loading").css("display","none");
								$('#modal-data').removeClass("on");
								alert("error email lolll");
							}
						}
					}); 
				}
				
				
				
            });
			$('.btn-ok').click(function () {
				$('#modal-data').removeClass("on");
				$('#modal-konfirmasi').removeClass("on");
            });
     });

	</script>

  </body>

</html>
