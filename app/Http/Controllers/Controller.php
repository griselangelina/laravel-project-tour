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

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	 public function index()
    {
       //$posts = DB::select('select * from product where productid=2');
	     //     $posts2 = DB::select('select * from produk where productid=1');
 
		//$posts=\App\Product::all();
		//dd($posts);

		/*$posts = \App\Product::select('prd_nm','text_detail','price','img_url')
		->join('corner_detail', 'dp_product.prd_id', '=', 'corner_detail.prd_id')
		->join('dp_corner', 'dp_corner.corner_id', '=', 'corner_detail.corner_id')
		->get();*/

		//$post_count=$posts->count();
		//$posts = $contributers->displaycorner()->get(); 
       // return view('hello', compact('posts','post_count')); // melempar data ke view
	   
	   $post1=$this->ajaxFloor1();
	   $post2=$this->ajaxFloor2();
	   $banner=$this->banner();
	   return view('hello',compact('post1','post2','banner'));
    }
	
	 public function ajaxFloor1()
    {
       
		$floor1Data = \App\Product::select('prd_nm','text_detail','price','img_url','prd_als_nm')
		->join('corner_detail', 'dp_product.prd_id', '=', 'corner_detail.foreign_id')
		->join('dp_corner', 'dp_corner.corner_id', '=', 'corner_detail.corner_id')
		->where('corner_name','Top Product')
		->get();

		return $floor1Data;//response()->json($floor1Data); // melempar data ke view
    }
	
	public function ajaxFloor2()
    {
       
		$floor2Data = \App\Category3::select('ctgr_3_nm','dp_ctgr_3.ctgr_3_id','cd','image')
		->join('corner_detail', 'dp_ctgr_3.ctgr_3_id', '=', 'corner_detail.foreign_id')
		->join('dp_corner', 'dp_corner.corner_id', '=', 'corner_detail.corner_id')
		->where('corner_name','Top Destinations')
		->get();

		return $floor2Data;//response()->json($floor2Data); // melempar data ke view
    }
	
	public function banner()
    {
       
		$banner = \App\PromoBanner::select('id','banner_name','banner_url','banner_image')
		->get();

		return $banner;//response()->json($floor2Data); // melempar data ke view
    }
	public function sendQuestion(Request $request)
    {
			Log::info("haloooooooo");

		/*$id = DB::table('transaksi')->insertGetId(
			array('prd_id' => $request->prdId, 'no_trx' => $trxId,'nama_buyer' => $request->nama,'telp' => $request->telp,'email' =>$request->email,'spesial_req' => $request->spes_req)
		);*/
		$name=$request->nama;
		$telp=$request->telp;
		$message=$request->spes_req;
		$email=$request->email;
		$mailControl = new MailController();
		$sendemail = $mailControl->sendQuestions($name,$telp,$message,$email);
		if($sendemail=="error"){
			$response = array(
          'status' => 'fail'
		  );
		}else{
			$response = array(
			  'status' => 'success'
			  );
		}
					Log::info($response);

		  return response()->json($response); 
    }
	
	public function emailsubscribe(Request $request)
    {

			Log::info("haloooooooeee");
		$emailSubs=$request->emailsubs;
		$mailControl = new MailController();
		$sendemail = $mailControl->sendsubscribe($emailSubs);
		if($sendemail=="error"){
			$response = array(
          'status' => 'fail'
		  );
		}else{
			$response = array(
			  'status' => 'success'
			  );
		}
					Log::info($response);

		  return response()->json($response); 
    }
}
