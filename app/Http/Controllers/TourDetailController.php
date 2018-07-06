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

class TourDetailController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	
	 public function tourProduct($id)
    {

		$product = $this-> getProduct($id);	
		$productdetail = $this-> getProductDetail($id);	
		$productitin = $this-> getProductItin($id);

	   return view('detailproduct',compact('product','productdetail','productitin'));
    }
	public function getProduct($id)
    {

		$listproduct = \App\Product::select('prd_nm','price','prd_id','prd_als_nm')
		->where('prd_als_nm',$id)
		->get();
	   return $listproduct;
    }
	public function getProductDetail($id)
    {

		$listproduct = \App\ProductDetail::select('tnc','inclusion','exclusion')
		->join('dp_product', 'dp_product.prd_id', '=', 'dp_product_detail.prd_id')
		->where('dp_product.prd_als_nm',$id)
		->get();
	   return $listproduct;
    }
	public function getProductItin($id)
    {

		$listproduct = \App\ProductItinerary::select('day','itin_text','itin_title')
		->join('dp_product', 'dp_product.prd_id', '=', 'product_itinerary.prd_id')
		->where('dp_product.prd_als_nm',$id)
		->get();
	   return $listproduct;
    }
	public function submitdata(Request $request)
    {
		$randUniq=$this->randString(4);
		$dateNow = \Carbon\Carbon::now()->timezone('Asia/jakarta');

		Log::info($randUniq);
		$date1= $dateNow->format('Ymd');
		$trxId=$date1.$randUniq;
		$id = DB::table('transaksi')->insertGetId(
			array('prd_id' => $request->prdId, 'no_trx' => $trxId,'nama_buyer' => $request->nama,'telp' => $request->telp,'email' =>$request->email,'spesial_req' => $request->spes_req)
		);
		$mailControl = new MailController();
		$sendemail = $mailControl->send($request->email,$request->nama,$request->telp,$request->spes_req,$trxId);
		//$sendemail2 = $mailControl->sendnotif("griselangelina@gmail.com");
		if($sendemail=="error"){
			$response = array(
          'status' => 'fail',
          'msg' => $request->nama,
		  'trxid' => $trxId,
		  'email' => $request->email
		  );
		}else{
		$response = array(
          'status' => 'success',
          'msg' => $request->nama,
		  'trxid' => $trxId,
		  'email' => $request->email
		  );
		}
		  return response()->json($response); 
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
