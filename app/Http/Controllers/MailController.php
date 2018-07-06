<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use App\Mail\ContactUsEmail;
use App\Mail\CustomTripEmail;
use App\Mail\EmailSubscribeEmail;
use App\Mail\EmailNotification;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
 use Exception;
class MailController extends Controller
{
    public function send($email,$nama,$telp,$spes_req,$trxId)
    {
		try {
		 $objDemo = new \stdClass();
        $objDemo->nama = $nama;
        $objDemo->email = $email;
        $objDemo->telp = $telp;
        $objDemo->special_req = $spes_req;
         $objDemo->trxId = $trxId;

        Mail::to($"griselangelina@gmail.com")->send(new DemoEmail($objDemo));

		}
		catch (\Exception $e) {
			return "error";
		}
    }
	public function sendnotif($email,$nama,$telp,$spes_req,$trxId)
    {
		try{
		$objDemo = new \stdClass();
        $objDemo->nama = $nama;
        $objDemo->email = $email;
        $objDemo->telp = $telp;
        $objDemo->special_req = $spes_req;
        $objDemo->trxId = $trxId;
	 
			Mail::to($email)->send(new EmailNotification($objDemo));
		}
		catch (\Exception $e) {
			return "error";
		}
    }
	public function sendQuestions($name,$telp,$message,$email)
    {
		try{
			$objDemo = new \stdClass();
			$objDemo->name = $name;
			$objDemo->email = $email;
			$objDemo->telp = $telp;
			$objDemo->receiver = "admin";
			$objDemo->message = $message;
	 
			Mail::to("griselangelina@gmail.com")->send(new ContactUsEmail($objDemo));
}
		catch (\Exception $e) {
			return "error";
		}    }
	public function sendsubscribe($emailSubs)
    {
		
		try {
		 $objDemo = new \stdClass();
         $objDemo->emailSubs = $emailSubs;
       
         Mail::to("griselangelina@gmail.com")->send(new EmailSubscribeEmail($objDemo));

		}
		catch (\Exception $e) {
			return "error";
		}
    }
	public function sendCustomTrip($request,$trxId)
    {
		try{
			$objDemo = new \stdClass();
			$objDemo->firstname = $request ->firstname;
			$objDemo->familyname = $request ->familyname;
			$objDemo->email = $request->email;
			$objDemo->telp = $request->telp;
			$objDemo->destination = $request->destination;
			$objDemo->depart_date = $request->depart_date;
			$objDemo->adult_num = $request->adult_num;
			$objDemo->child_num = $request->child_num;
			$objDemo->hotel = $request->hotel;
			$objDemo->airline = $request->airline;
			$objDemo->spes_req = $request->spes_req;
			$objDemo->trxId = $trxId;

			$objDemo->receiver = "admin";
	 
			Mail::to("griselangelina@gmail.com")->send(new CustomTripEmail($objDemo));
			return "success";

		}
		catch (\Exception $e) {
			return "error";
		}    
	}
}
