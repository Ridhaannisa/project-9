<?php 

namespace App\Models;
use App\Models\User;
use App\Models\Kategori;

class Produk extends Model
{
	protected $table = 'produk';

	protected $casts = [
		'created_at' => 'datetime',
		'updated_at' => 'datetime',
		'berat' => 'decimal:2'
	];
	

	function seller(){
		return $this->belongsTo(User::class, 'id_user');
	}

	function kategori(){
		return $this->belongsTo(Kategori::class, 'id_kategori');
	} 

	function getHargaAttribute(){
		return "Rp. ".number_format($this->attributes['harga']);
	}

	
}