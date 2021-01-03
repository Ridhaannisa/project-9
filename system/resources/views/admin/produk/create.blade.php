@extends('template.base')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 mt-5">
			<div class="card">
				<div class="card-header">
					Tambah Data Produk
				</div>
				<div class="card-body">
					<form action="{{url('admin/produk')}}" method="post">	
						@csrf
						
						<div class="form-group">
							<label for="nama" class="control-label">Nama Produk</label>
							<input type="text" name="nama" id="nama" class="form-control">
						</div>
						<div class="row">
						    <div class="col">
						    	<label for="harga" class="control-label">Harga Produk</label>
						      <input type="text" class="form-control" name="harga" id="harga">
						    </div>
						</div>
						<div class="row">
						<div class="col mt-3">
						    <label for="stok" class="control-label">Stok Produk</label>
						     <input type="text" class="form-control" name="stok" id="stok">
						  </div>
						</div>
						<div class="row">
						<div class="col mt-3">
						    <label for="berat" class="control-label">Berat</label>
						     <input type="text" class="form-control" name="berat" id="berat">
						  </div>
						</div>

						<div class="form-group mt-3">
							<label for="kategori" class="control-label">Kategori</label>
							<select name="id_kategori" class="form-control">
								@foreach($list_kategori as $kategori)
									<option value="{{$kategori->id}}">{{$kategori->nama}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="deskripsi" class="control-label">Deskripsi Produk</label>
							<textarea class="form-control" name="deskripsi" id="deskripsi" rows="5"></textarea>
						</div>
						
						<button class="btn btn-dark btn-sm float-right"><i class="fa fa-save"></i> Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection