<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use DB;

class CustomTripController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	
	 /*public function tourProduct($id)
    {

		$product = $this-> getProduct($id);	
		$productdetail = $this-> getProductDetail($id);	
		$productitin = $this-> getProductItin($id);

	   return view('detailproduct',compact('product','productdetail','productitin'));
    }*/
		public function submitdata(Request $request)
    {
		$randUniq=$this->randString(4);
		$dateNow = \Carbon\Carbon::now()->timezone('Asia/jakarta');

		Log::info($randUniq);
		$date1= $dateNow->format('Ymd');
		$trxId=$randUniq.$date1;
		$id = DB::table('custom_trip')->insertGetId(
			array('custom_id' => $trxId, 'first_name' => $request->firstname,'family_name' => $request->familyname,
			'telp' => $request->telp,'email' =>$request->email,'destination' => $request->destination,
			'depart_date' => $request->departdate,'adult_number' =>$request->adult_num,'child_number' => $request->child_num,
						'hotel' => $request->hotel,'airline' =>$request->airline,'spesial_req' => $request->spes_req

			)
		);
		$mailControl = new MailController();
		$sendemail = $mailControl->sendCustomTrip($request,$trxId);
		$sendemail2 = $mailControl->sendnotif("griselangelina@gmail.com");
				//Log::info($sendemail);
	$sendemail="success";
	
		if($sendemail=="error"){
			$response = array(
          'status' => 'fail',
          'msg' => $request->nama,
		  'email' => $request->email
		  );
		}else{
		$response = array(
          'status' => 'success',
          'msg' => $request->nama,
		  'email' => $request->email
		  );
		}
	
		  Log::info($request->departdate);

		//  return response()->json($response); 
			   //return view('about');
			   return redirect()->to('/afterconfirm');


    }
	function randString($length, $charset='0123456789')
{
    $str = '';
    $count = strlen($charset);
    while ($length--) {
        $str .= $charset[mt_rand(0, $count-1)];
    }

    return $str;
}
}
