<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisplayCorner extends Model
{
    	protected $table='corner_detail';
		    protected $primaryKey = 'corner_id';

		public function product() {
		return $this->belongsToMany(Product::Class,'corner_detail','corner_id','prd_id')->withPivot('text_detail');    
		//return $this->belongsTo('\App\Product','prd_id');

		}
}
