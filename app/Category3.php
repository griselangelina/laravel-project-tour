<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category3 extends Model
{
    //
		protected $table='dp_ctgr_3';
		    protected $primaryKey = 'ctgr_3_id';

		public function displaycorner() {
		return $this->belongsToMany(DisplayCorner::Class,'corner_detail','prd_id','corner_id')->withPivot('text_detail');    
		//return $this->hasMany('\App\DisplayCorner','corner_id'); 

		}

}
