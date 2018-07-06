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

class PromoController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	
	 public function promolist()
    {
		$promolist = $this-> getPromoList();	
	   return view('promolist',compact('promolist'));
    }
	
	public function getPromoList()
    {

		$listproduct = \App\Promo::select('promo_name','promo_img','promo_url','promo_dtl')
		->get();
	   return $listproduct;
    }
	
	
}
