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
use DB;

class MainAjaxController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	 public function ajaxFloor1()
    {
       
		$floor1Data = \App\Product::select('prd_nm','text_detail','price','img_url')
		->join('corner_detail', 'dp_product.prd_id', '=', 'corner_detail.foreign_id')
		->join('dp_corner', 'dp_corner.corner_id', '=', 'corner_detail.corner_id')
		->where('corner_name','Top Product')
		->get();

		return $floor1Data;//response()->json($floor1Data); // melempar data ke view
    }
	 public function ajaxFloor2()
    {
       
		$floor2Data = \App\Product::select('ctgr_3_nm','dp_ctgr_3.ctgr_3_id','ctgr_3_img')
		-> join('dp_ctgr_3','dp_ctgr_3.ctgr_3_id','=','dp_product.ctgr_3_id')
		->join('corner_detail', 'dp_ctgr_3.ctgr_3_id', '=', 'corner_detail.foreign_id')
		->join('dp_corner', 'dp_corner.corner_id', '=', 'corner_detail.corner_id')
		->where('corner_name','Top Destinations')
		->get();

		return response()->json($floor2Data); // melempar data ke view
    }
	
	
}
