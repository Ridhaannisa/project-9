<?php 

namespace App\Models;

/**
 * 
 */
class ClientProduk extends Model
{
	
	protected $table = 'belanja';

	function seller(){
		return $this->belongsTo(User::class, 'id_user');
	}
}