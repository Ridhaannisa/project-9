<?php 


namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\ClientProduk;

/**
 * 
 */
class ClientProdukController extends Controller
{
	
	function index()
	{
		$data['list_produk'] = Produk::all();
		return view('client/index', $data);
	}
	
	function create(Produk $produk)
	{
	$data['produk'] = $produk;
		return view('client/beli', $data);
	}
	
	function store(Produk $produk)
	{
		$data['produk'] = $produk;

		$beli = new ClientProduk;
		$beli->nama = request('nama');
		$beli->harga = request('harga');
		$beli->total = request('total');
		$beli->save();

		return redirect('/')->with('success', 'Data Berhasil di Tambahkan ke Keranjang');
	}
	
	function lihat(){
		$data['list_pesanan'] = ClientProduk::all();
		return view('client/pesanan', $data);
	}

	function show(Produk $produk)
	{
		$data['produk'] = $produk;
		return view('client/show', $data);
	}
	
	function edit(ClientProduk $produk)
	{
		$data['pesanan'] = $produk;
		return view('client/edit', $data);
		
	}
	
	function update(ClientProduk $produk)
	{
		
		$produk->total = request('total');
		$produk->save();

		return redirect('pesanan')->with('success', 'Data Berhasil di Update');
	}
	
	function destroy(ClientProduk $produk)
	{
		$produk->delete();

		return redirect('pesanan')->with('danger', 'Data Berhasil di Hapus');
	}

	function clientfilter(){
		$nama = request('nama');
		$stok = explode(",", request('stok'));
		$data['harga_min']= $harga_min = request('harga_min');
		$data['harga_max']= $harga_max = request('harga_max');
		$data['list_produk'] = Produk::where('nama', 'like' , "%$nama%")->get();
		//$data['list_produk'] = Produk::whereIn('stok', $stok)->get();
		//$data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->get();
		$data['nama'] = $nama;
		$data['stok'] = request('stok');
		return view('client.index', $data);
	}
}