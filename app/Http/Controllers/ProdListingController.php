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

class ProdListingController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	
	 public function listproduct($id)
    {
		$jenis="0";
		$listnegara=$this->getCtgr3();
		$paramid=$id;
		if($id=="individual"||$id=="honeymoon"||$id=="budget"||$id=="open-trip"){
			$listproduct = $this-> getproductCtgr1($id);
			$jenis="1";
	   return view('listproduct',compact('listproduct','jenis','listnegara','paramid'));
		}else{ // search name from $ctgr3 else lempar ke 404
		
		$listproduct = $this-> getproductCtgr3($id);
		}
	   return view('listproduct',compact('listproduct','jenis','listnegara','paramid'));
    }
	
	public function listproductAjax($id,$cd)
    {
Log::info($cd);
		$listproduct=$this->getproductCtgrCountry($id,$cd);

		return $listproduct;
	}
	
	
	public function getproductCtgr1($id)
    {

		$listproduct = \App\Product::select('prd_nm','price','img_url','prd_als_nm')
		->join('dp_ctgr_1', 'dp_ctgr_1.ctgr_1_id', '=', 'dp_product.ctgr_1_id')
		->where('dp_ctgr_1.alias',$id)
		->get();
	   return $listproduct;
    }
	public function getproductCtgrCountry($id,$cd)
    {

		$listproduct = \App\Product::select('prd_nm','price','img_url','prd_als_nm')
		->join('dp_ctgr_1', 'dp_ctgr_1.ctgr_1_id', '=', 'dp_product.ctgr_1_id')
		->join('dp_ctgr_3', 'dp_ctgr_3.ctgr_3_id', '=', 'dp_product.ctgr_3_id')
		->where('dp_ctgr_1.alias',$id)
		->where('dp_ctgr_3.cd',$cd)
		->get();
	   return response()->json($listproduct);
    }
	public function getproductCtgr3($id)
    {

		$listproduct = \App\Product::select('prd_nm','price','img_url','prd_als_nm')
		->join('dp_ctgr_3', 'dp_ctgr_3.ctgr_3_id', '=', 'dp_product.ctgr_3_id')
		->where('dp_ctgr_3.cd',$id)
		->get();
	   return $listproduct;
    }
	public function getCtgr3()
    {

		$listctgr3 = \App\Category3::select('ctgr_3_nm','ctgr_3_id','cd')
		->get();

	   return $listctgr3;
    }
	
}
